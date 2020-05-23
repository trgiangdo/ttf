<?php

use Illuminate\Database\Seeder;
use App\Exam;
use App\Exam\Listening;
use App\Exam\Reading;
use App\Exam\Part1;
use App\Exam\Part2;
use App\Exam\Part3;
use App\Exam\Part4;
use App\Exam\Part5;
use App\Exam\Part6;
use App\Exam\Part7;
use App\Exam\Example;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exam = factory(Exam::class)->create();

        $listening1 = factory(Listening::class)->create(['exam_id' => $exam->id, 'Part' => '1']);
        factory(Example::class)->create(['listening_id' => $listening1->id]);
        factory(Part1::class, 6)->create(['listening_id' => $listening1->id]);

        $listening2 = factory(Listening::class)->create(['exam_id' => $exam->id, 'Part' => '2']);
        factory(Example::class)->create(['listening_id' => $listening2->id, 'image_url' => null]);
        factory(Part2::class, 25)->create(['listening_id' => $listening2->id]);

        $listening3 = factory(Listening::class)->create(['exam_id' => $exam->id, 'Part' => '3']);
        factory(Part3::class, 39)->create(['listening_id' => $listening3->id]);

        $listening4 = factory(Listening::class)->create(['exam_id' => $exam->id, 'Part' => '4']);
        factory(Part4::class, 30)->create(['listening_id' => $listening4->id]);


        factory(Reading::class, 30)->create(['exam_id' => $exam->id, 'Part' => '5'])->each(function ($reading) {
            $reading->part5()->save(factory(Part5::class)->create(['reading_id' => $reading->id]));
        });

        factory(Reading::class, 4)->create(['exam_id' => $exam->id, 'Part' => '6'])->each(function ($reading) {
            $reading->part6()->saveMany(factory(Part6::class, 4)->create(['reading_id' => $reading->id]));
        });

        factory(Reading::class, 10)->create(['exam_id' => $exam->id, 'Part' => '7'])->each(function ($reading) {
            $reading->part7()->saveMany(factory(Part7::class, 5)->create(['reading_id' => $reading->id]));
        });
    }
}
