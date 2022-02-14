<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {

            $rand500 = str_random(500);

            $params = [
                'comment' => $rand500,
                'question_id' => $i,
                'user_id' => rand(1,3),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            DB::table('comments')->insert($params);
        }
    }
}
