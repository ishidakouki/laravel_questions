<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++ ){

            $title = str_random(20);
            $problem = str_random(1000);
            $problemsolving = str_random(1000);
            $execution = str_random(1000);
            $data =
            [
                'user_id' =>rand(1,2),
                'title' => $title,
                'problem' => $problem,
                'problemsolving' => $problemsolving,
                'execution' => $execution,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            DB::table('questions')->insert($data);
        }
    }
}
