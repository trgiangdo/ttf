<?php

use Illuminate\Database\Seeder;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_types')->insert([
            'Part' => 1,
            'type' => 'human',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 1,
            'type' => 'noHuman',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 2,
            'type' => 'Wh- question',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 2,
            'type' => 'yes/no question',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 2,
            'type' => 'tag question',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 2,
            'type' => 'choice question',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 3,
            'type' => 'general',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 3,
            'type' => 'detail',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 3,
            'type' => 'do-next',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 4,
            'type' => 'general',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 4,
            'type' => 'detail',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 4,
            'type' => 'do-next',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 5,
            'type' => 'grammar',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 5,
            'type' => 'vocabs',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 6,
            'type' => 'grammar',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 6,
            'type' => 'vocabs',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 6,
            'type' => 'fill in sentence',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 7,
            'type' => 'general',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 7,
            'type' => 'detail',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 7,
            'type' => 'vocabs',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 7,
            'type' => 'author\'s idea',
            'difficulty' => 1
        ]);

        DB::table('question_types')->insert([
            'Part' => 7,
            'type' => 'original',
            'difficulty' => 1
        ]);
    }
}
