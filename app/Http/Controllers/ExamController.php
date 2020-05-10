<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\Exam\QuestionType;
use App\Http\Requests\StoreExamRequest;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'exam.list',
            ['exams' => Exam::paginate(10)]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Exam::class);

        return view(
            'exam.create',
            ['question_type' => QuestionType::all()]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamRequest $request)
    {
        $this->authorize('create', Exam::class);

        $exam = Exam::create([
            'name' => $request->exam_name,
            'type' => $request->exam_type
        ]);

        $p1_audio = $request->file('part1_audio');
        $p1_audio_fileName = $request->exam_name . '-' . $p1_audio->getClientOriginalName();
        $p1_audio->storeAs('part1_audios', $p1_audio_fileName, 'public');

        $part1 = $exam->listenings()->create([
            'audio_url' => $p1_audio_fileName,
            'Part' => '1'
        ]);

        $p1_eg_img = $request->file('part1_example_img');
        $p1_eg_img_fileName = $request->exam_name . '-' . $p1_eg_img->getClientOriginalName();
        $p1_eg_img->storeAs('images', $p1_eg_img_fileName, 'public');

        $part1->example()->create([
            'example' => $request->part1_example,
            'image_url' => $p1_eg_img_fileName
        ]);

        for ($ques = 1; $ques < $request->startPart2; $ques++) {
            $p1_img = $request->file('part1_example_img');
            $p1_img_fileName = $request->exam_name . '-' . $p1_img->getClientOriginalName();
            $p1_img->storeAs('images', $p1_img_fileName, 'public');

            $part1->part1()->create([
                'question_type_id' => $request->questionType[$ques],
                'image_url' => $p1_img,
                'answer' => $request->answer[$ques]
            ]);
        }

        $p2_audio = $request->file('part2_audio');
        $p2_audio_fileName = $request->exam_name . '-' . $p2_audio->getClientOriginalName();
        $p2_audio->storeAs('part2_audios', $p2_audio_fileName, 'public');

        $part2 = $exam->listenings()->create([
            'audio_url' => $p2_audio_fileName,
            'Part' => '2'
        ]);

        $part2->example()->create([
            'example' => $request->part2_example
        ]);

        for ($ques = $request->startPart2; $ques < $request->startPart3; $ques++) {
            $part2->part2()->create([
                'question_type_id' => $request->questionType[$ques],
                'answer' => $request->answer[$ques]
            ]);
        }

        $p3_audio = $request->file('part3_audio');
        $p3_audio_fileName = $request->exam_name . '-' . $p3_audio->getClientOriginalName();
        $p3_audio->storeAs('part3_audios', $p3_audio_fileName, 'public');

        $part3 = $exam->listenings()->create([
            'audio_url' => $p3_audio_fileName,
            'Part' => '3'
        ]);

        for ($ques = $request->startPart3; $ques < $request->startPart4; $ques++) {
            $part3->part3()->create([
                'question_type_id' => $request->questionType[$ques],
                'question' => $request->question[$ques],
                'choice_A' => $request->choiceA[$ques],
                'choice_B' => $request->choiceB[$ques],
                'choice_C' => $request->choiceC[$ques],
                'choice_D' => $request->choiceD[$ques],
                'answer' => $request->answer[$ques]
            ]);
        }

        $p4_audio = $request->file('part4_audio');
        $p4_audio_fileName = $request->exam_name . '-' . $p4_audio->getClientOriginalName();
        $p4_audio->storeAs('part4_audios', $p4_audio_fileName, 'public');

        $part4 = $exam->listenings()->create([
            'audio_url' => $p4_audio_fileName,
            'Part' => '4'
        ]);

        for ($ques = $request->startPart4; $ques < $request->startPart5; $ques++) {
            $part4->part4()->create([
                'question_type_id' => $request->questionType[$ques],
                'question' => $request->question[$ques],
                'choice_A' => $request->choiceA[$ques],
                'choice_B' => $request->choiceB[$ques],
                'choice_C' => $request->choiceC[$ques],
                'choice_D' => $request->choiceD[$ques],
                'answer' => $request->answer[$ques]
            ]);
        }

        for ($ques = $request->startPart5; $ques < $request->startPart6; $ques++) {
            $part5 = $exam->readings()->create([
                'paragraph' => $request->part5_paragraph[$ques],
                'Part' => '5'
            ]);

            $part5->part5()->create([
                'question_type_id' => $request->questionType[$ques],
                'choice_A' => $request->choiceA[$ques],
                'choice_B' => $request->choiceB[$ques],
                'choice_C' => $request->choiceC[$ques],
                'choice_D' => $request->choiceD[$ques],
                'answer' => $request->answer[$ques]
            ]);
        }

        for ($para = 1; $para <= ($request->startPart7-$request->startPart6)/3; $para++) {
            $part6 = $exam->readings()->create([
                'paragraph' => $request->part6_paragraph[$para],
                'Part' => '6'
            ]);

            for ($ques = 1; $ques < 3; $ques++) {
                $part6->part6()->create([
                    'question_type_id' => $request->questionType[($para-1)*3 + $request->startPart6 + $ques],
                    'choice_A' => $request->choiceA[($para-1)*3 + $request->startPart6 + $ques],
                    'choice_B' => $request->choiceB[($para-1)*3 + $request->startPart6 + $ques],
                    'choice_C' => $request->choiceC[($para-1)*3 + $request->startPart6 + $ques],
                    'choice_D' => $request->choiceD[($para-1)*3 + $request->startPart6 + $ques],
                    'answer' => $request->answer[($para-1)*3 + $request->startPart6 + $ques]
                ]);
            }
        }

        $startOfThisPara = $request->startPart7;
        for ($para = 1; $para <= $request->numParaPart7; $para++) {
            $part7 = $exam->readings()->create([
                'paragraph' => $request->part7_paragraph[$para],
                'Part' => '7'
            ]);

            for ($ques = $startOfThisPara;
                 $ques < $startOfThisPara + $request->part7_numQuestions[$para];
                 $ques++) {
                $part7->part7()->create([
                    'question_type_id' => $request->questionType[$ques],
                    'question' => $request->question[$ques],
                    'choice_A' => $request->choiceA[$ques],
                    'choice_B' => $request->choiceB[$ques],
                    'choice_C' => $request->choiceC[$ques],
                    'choice_D' => $request->choiceD[$ques],
                    'answer' => $request->answer[$ques]
                ]);
            }
            $startOfThisPara += $request->part7_numQuestions[$para];
        }

        return redirect()->back()->with('status', __('message.edited'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam = Exam::with(['listenings', 'readings'])->find($id);  // Eager Loading
        // Eager Loading nếu áp dụng lên $exam->listening sẽ áp dụng lên toàn bộ instance của Listenings chứ không phải là từng instance theo từng Part nên không thể áp dụng trong trường hợp này

        // Do ->where() trả về Collection nên nếu không sử dụng ->first() thì sẽ phải dùng 1 vòng lặp bên ngoài nữa hoặc dùng $listening_part1[0]
        $listenings_part1 = $exam->listenings->where('Part', 1)->first();
        $listenings_part2 = $exam->listenings->where('Part', 2)->first();
        $listenings_part3 = $exam->listenings->where('Part', 3)->first();
        $listenings_part4 = $exam->listenings->where('Part', 4)->first();

        $readings_part5 = $exam->readings->where('Part', 5);
        $readings_part6 = $exam->readings->where('Part', 6);
        $readings_part7 = $exam->readings->where('Part', 7);

        return view(
            'exam.test', compact(
                'listenings_part1', 'listenings_part2', 'listenings_part3', 'listenings_part4',
                'readings_part5', 'readings_part6', 'readings_part7'
            )
        );
    }

    /**ơ
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::findOrFail($id);

        $this->authorize('update', $exam);

        return view(
            'exam.edit',
            compact($exam)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);

        $this->authorize('update', $exam);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Exam::findOrFail($id));
        Exam::where('id', $id)->delete();
        return redirect()->back()->with('status', __('message.edited'));
    }
}
