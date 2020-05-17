<?php

namespace App;

use App\Http\Requests\StoreExamRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Exam extends Model
{
	protected $fillable = [
        'name', 'type',
    ];


    public function listenings()
    {
        return $this->hasMany('App\Exam\Listening');
    }

    public function readings()
    {
        return $this->hasMany('App\Exam\Reading');
    }

    /**
     * Create a new Exam with $request contain all neccessery information
     * Request are validate through StoreExamRequest
     *
     * @param StoreExamRequest $request
     */
    public static function createAllPart(StoreExamRequest $request)
    {
        // Create new Exam record
        $exam = self::create([
            'name' => $request->exam_name,
            'type' => $request->exam_type
        ]);

        // Save part1 audio
        $p1_audio = $request->file('part1_audio');
        $p1_audio_fileName = $request->exam_name . '-' . $p1_audio->getClientOriginalName();
        $p1_audio->storeAs('part1_audios', $p1_audio_fileName, 'public');

        // Create new Listening record
        $part1 = $exam->listenings()->create([
            'audio_url' => $p1_audio_fileName,
            'Part' => '1'
        ]);

        // Save part1 example image
        $p1_eg_img = $request->file('part1_example_image');
        $p1_eg_img_fileName = $request->exam_name . '-' . $p1_eg_img->getClientOriginalName();
        $p1_eg_img->storeAs('images', $p1_eg_img_fileName, 'public');

        // Create new example record
        $part1->example()->create([
            'example' => $request->part1_example,
            'image_url' => $p1_eg_img_fileName
        ]);

        // Create new part1 questions
        $images = $request->file('image');
        for ($ques = 1; $ques < $request->startPart2; $ques++) {
            $p1_img = $images[$ques];
            $p1_img_fileName = $request->exam_name . '-' . $p1_img->getClientOriginalName();
            $p1_img->storeAs('images', $p1_img_fileName, 'public');

            $part1->part1()->create([
                'question_type_id' => $request->questionType[$ques],
                'image_url' => $p1_img_fileName,
                'answer' => $request->answer[$ques]
            ]);
        }

        // Create new Part2 record and its questions
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

        // Create new Part3 record and its questions
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

        // Create new Part4 record and its questions
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

        // Create new Part5 record and its questions
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

        // Create new Part6 record and its questions
        for ($para = 1; $para <= ($request->startPart7-$request->startPart6)/3; $para++) {
            $part6 = $exam->readings()->create([
                'paragraph' => $request->part6_paragraph[$para],
                'Part' => '6'
            ]);

            for ($ques = 0; $ques < 3; $ques++) {
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

        // Create new Part7 record and its questions
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
    }

    /**
     * Update an exam except for exam name
     *
     * @param \App\Http\Requests $request
     */
    public function updateAllPart($request)
    {
        // update Listening part1
        $listening_part1 = $this->listenings->where('Part', 1)->first();
        if ($request->hasFile('part1_audio')) {
            Storage::delete("part1_audios/$listening_part1->audio_url");
            $p1_audio = $request->file('part1_audio');
            $p1_audio_fileName = $request->exam_name . '-' . $p1_audio->getClientOriginalName();
            $p1_audio->storeAs('part1_audios', $p1_audio_fileName, 'public');

            $listening_part1->update([
                'audio_url' => $p1_audio_fileName
            ]);
        }

        // Update Part1 example
        $part1_example = $listening_part1->example;
        if ($request->hasFile('part1_example_image')) {
            Storage::delete("images/$part1_example->image_url");
            $p1_eg_img = $request->file('part1_example_image');
            $p1_eg_img_fileName = $request->exam_name . '-' . $p1_eg_img->getClientOriginalName();
            $p1_eg_img->storeAs('images', $p1_eg_img_fileName, 'public');

            $part1_example->image_url = $p1_eg_img_fileName;
        }
        $part1_example->example = $request->part1_example;
        $part1_example->save();

        // Update Part1 questions
        $images = $request->file('image');
        $part1_questions = $listening_part1->part1;
        for ($ques = 1; $ques < $request->startPart2; $ques++) {
            if (isset($images[$ques])) {
                Storage::delete("images/" . $part1_questions[$ques-1]->image_url);
                $p1_img = $images[$ques];
                $p1_img_fileName = $request->exam_name . '-' . $p1_img->getClientOriginalName();
                $p1_img->storeAs('images', $p1_img_fileName, 'public');
                $part1_questions[$ques-1]->update([
                    'image_url' => $p1_img_fileName
                ]);
            }

            $part1_questions[$ques-1]->update([
                'question_type_id' => $request->questionType[$ques],
                'answer' => $request->answer[$ques]
            ]);
        }

        // update Listening part2
        $listening_part2 = $this->listenings->where('Part', 2)->first();
        if ($request->hasFile('part2_audio')) {
            Storage::delete("part2_audios/$listening_part2->audio_url");
            $p2_audio = $request->file('part2_audio');
            $p2_audio_fileName = $request->exam_name . '-' . $p2_audio->getClientOriginalName();
            $p2_audio->storeAs('part2_audios', $p2_audio_fileName, 'public');

            $listening_part2->update([
                'audio_url' => $p2_audio_fileName
            ]);
        }

        // Update Part2 example
        $listening_part2->example->update([
            'example' => $request->part2_example
        ]);

        // Update Part2 questions
        $part2_questions = $listening_part2->part2;
        for ($ques = $request->startPart2; $ques < $request->startPart3; $ques++) {
            $part2_questions[$ques-$request->startPart2]->update([
                'question_type_id' => $request->questionType[$ques],
                'answer' => $request->answer[$ques]
            ]);
        }

        // Update Listening Part 3
        $listening_part3 = $this->listenings->where('Part', 3)->first();
        if ($request->hasFile('part3_audio')) {
            Storage::delete("part3_audios/$listening_part3->audio_url");
            $p3_audio = $request->file('part3_audio');
            $p3_audio_fileName = $request->exam_name . '-' . $p3_audio->getClientOriginalName();
            $p3_audio->storeAs('part3_audios', $p3_audio_fileName, 'public');

            $listening_part3->update([
                'audio_url' => $p3_audio_fileName
            ]);
        }

        // Update Part3 questions
        $part3_questions = $listening_part3->part3;
        for ($ques = $request->startPart3; $ques < $request->startPart4; $ques++) {
            $part3_questions[$ques-$request->startPart3]->update([
                'question_type_id' => $request->questionType[$ques],
                'question' => $request->question[$ques],
                'choice_A' => $request->choiceA[$ques],
                'choice_B' => $request->choiceB[$ques],
                'choice_C' => $request->choiceC[$ques],
                'choice_D' => $request->choiceD[$ques],
                'answer' => $request->answer[$ques]
            ]);
        }

        // Update Listening Part 4
        $listening_part4 = $this->listenings->where('Part', 4)->first();
        if ($request->hasFile('part4_audio')) {
            Storage::delete("part4_audios/$listening_part4->audio_url");
            $p4_audio = $request->file('part4_audio');
            $p4_audio_fileName = $request->exam_name . '-' . $p4_audio->getClientOriginalName();
            $p4_audio->storeAs('part4_audios', $p4_audio_fileName, 'public');

            $listening_part4->update([
                'audio_url' => $p4_audio_fileName
            ]);
        }

        // Update Part4 questions
        $part4_questions = $listening_part4->part4;
        for ($ques = $request->startPart4; $ques < $request->startPart5; $ques++) {
            $part4_questions[$ques-$request->startPart4]->update([
                'question_type_id' => $request->questionType[$ques],
                'question' => $request->question[$ques],
                'choice_A' => $request->choiceA[$ques],
                'choice_B' => $request->choiceB[$ques],
                'choice_C' => $request->choiceC[$ques],
                'choice_D' => $request->choiceD[$ques],
                'answer' => $request->answer[$ques]
            ]);
        }

        // Update Part5 record and its questions
        $readings_part5 = $this->readings->where('Part', 5);
        foreach ($readings_part5 as $index => $reading_part5) {
            $reading_part5->update([
                'paragraph' => $request->part5_paragraph[$request->startPart5 + $index],
            ]);

            $reading_part5->part5()->update([
                'question_type_id' => $request->questionType[$request->startPart5 + $index],
                'choice_A' => $request->choiceA[$request->startPart5 + $index],
                'choice_B' => $request->choiceB[$request->startPart5 + $index],
                'choice_C' => $request->choiceC[$request->startPart5 + $index],
                'choice_D' => $request->choiceD[$request->startPart5 + $index],
                'answer' => $request->answer[$request->startPart5 + $index]
            ]);
        }

        // Update Part 6 record and its questions
        $readings_part6 = $this->readings->where('Part', 6)->values();
        foreach ($readings_part6 as $paraIndex => $reading_part6) {
            $reading_part6->update([
                'paragraph' => $request->part6_paragraph[$paraIndex],
            ]);

            $questions = $reading_part6->part6;
            for ($ques = 0; $ques < 3; $ques++) {
                $questions[$ques]->update([
                    'question_type_id' => $request->questionType[$paraIndex*3 + $request->startPart6 + $ques],
                    'choice_A' => $request->choiceA[$paraIndex*3 + $request->startPart6 + $ques],
                    'choice_B' => $request->choiceB[$paraIndex*3 + $request->startPart6 + $ques],
                    'choice_C' => $request->choiceC[$paraIndex*3 + $request->startPart6 + $ques],
                    'choice_D' => $request->choiceD[$paraIndex*3 + $request->startPart6 + $ques],
                    'answer' => $request->answer[$paraIndex*3 + $request->startPart6 + $ques]
                ]);
            }
        }

        // Update Part 7 record and its questions
        $readings_part7 = $this->readings->where('Part', 7)->values();
        $startOfThisPara = $request->startPart7;
        foreach ($readings_part7 as $paraIndex => $reading_part7) {
            $reading_part7->update([
                'paragraph' => $request->part7_paragraph[$paraIndex],
            ]);

            $questions = $reading_part7->part7;
            if (count($questions) > $request->part7_numQuestions[$paraIndex]) {
                for ($redundant = $request->part7_numQuestions[$paraIndex]; $redundant < count($questions); $redundant++) {
                    $questions[$redundant]->delete();
                }
            }

            for ($ques = $startOfThisPara;
                 $ques < $startOfThisPara + $request->part7_numQuestions[$paraIndex];
                 $ques++) {
                if (isset($questions[$ques - $startOfThisPara])) {
                    $questions[$ques - $startOfThisPara]->update([
                        'question_type_id' => $request->questionType[$ques],
                        'question' => $request->question[$ques],
                        'choice_A' => $request->choiceA[$ques],
                        'choice_B' => $request->choiceB[$ques],
                        'choice_C' => $request->choiceC[$ques],
                        'choice_D' => $request->choiceD[$ques],
                        'answer' => $request->answer[$ques]
                    ]);
                } else {
                    $reading_part7->part7()->create([
                        'question_type_id' => $request->questionType[$ques],
                        'question' => $request->question[$ques],
                        'choice_A' => $request->choiceA[$ques],
                        'choice_B' => $request->choiceB[$ques],
                        'choice_C' => $request->choiceC[$ques],
                        'choice_D' => $request->choiceD[$ques],
                        'answer' => $request->answer[$ques]
                    ]);
                }
            }
            $startOfThisPara += $request->part7_numQuestions[$paraIndex];
        }
    }
}