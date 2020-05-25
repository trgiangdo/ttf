<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\Exam\QuestionType;
use App\Http\Requests\StoreExamRequest;

class ExamController extends Controller
{
    /**
     * Display a listing of the Exam.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'exam.list',
            ['exams' => Exam::orderByDesc('created_at')->paginate(10)]
        );
    }

    /**
     * Show the form for creating a new Exam.
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
     * Store a newly created Exam in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamRequest $request)
    {
        $this->authorize('create', Exam::class);

        Exam::createAllPart($request);

        return redirect(route('exam.index'))->with('status', __('message.edited'));
    }

    /**
     * Display the specified Exam.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam = Exam::with(['listenings', 'readings'])->find($id);  // Eager Loading
        // Eager Loading nếu áp dụng lên $exam->listening sẽ áp dụng lên toàn bộ instance của Listenings chứ không phải là từng instance theo từng Part nên không thể áp dụng trong trường hợp này

        // Do ->where() trả về Collection nên nếu không sử dụng ->first() thì sẽ phải dùng 1 vòng lặp bên ngoài nữa hoặc dùng $listening_part1[0]
        $listening_part1 = $exam->listenings->where('Part', 1)->first();
        $listening_part2 = $exam->listenings->where('Part', 2)->first();
        $listening_part3 = $exam->listenings->where('Part', 3)->first();
        $listening_part4 = $exam->listenings->where('Part', 4)->first();

        $readings_part5 = $exam->readings->where('Part', 5);
        $readings_part6 = $exam->readings->where('Part', 6);
        $readings_part7 = $exam->readings->where('Part', 7);

        return view(
            'exam.test', compact(
                'id', 'listening_part1', 'listening_part2', 'listening_part3', 'listening_part4',
                'readings_part5', 'readings_part6', 'readings_part7'
            )
        );
    }

    /**ơ
     * Show the form for editing the specified Exam.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::findOrFail($id);

        $this->authorize('update', $exam);

        $listening_part1 = $exam->listenings->where('Part', 1)->first();
        $listening_part2 = $exam->listenings->where('Part', 2)->first();
        $listening_part3 = $exam->listenings->where('Part', 3)->first();
        $listening_part4 = $exam->listenings->where('Part', 4)->first();

        $readings_part5 = $exam->readings->where('Part', 5);
        $readings_part6 = $exam->readings->where('Part', 6)->values();
        $readings_part7 = $exam->readings->where('Part', 7)->values();
        // ->values() trả về dữ liệu với index bắt đầu từ 0, khi json_encode sẽ trả về dạng Array

        // * Truyền dữ liệu kèm với các bảng con theo dạng JSON
        /* e.g: listening_part1: {
            name: '...',
            example: {
                example: '',
                image_url: ''
            },
            part1: {
                {
                    question_type_id: '..',
                    img_url: '..',
                    id: '..',
                },
            }
        }
        */

        $question_type = QuestionType::all();

        return view(
            'exam.edit', compact(
                'exam', 'question_type',
                'listening_part1', 'listening_part2', 'listening_part3', 'listening_part4',
                'readings_part5', 'readings_part6', 'readings_part7'
            )
        );
    }

    /**
     * Update the specified Exam in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);

        $this->authorize('update', $exam);

        $exam->name = $request->exam_name;
        $exam->save();

        $exam->updateAllPart($request);

        return redirect(route('exam.index'))->with('status', __('message.edited'));
    }

    /**
     * Remove the specified Exam from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);
        $this->authorize('delete', $exam);

        $exam->deleteResources();

        $exam->delete();

        return redirect()->back()->with('status', __('message.edited'));
    }
}
