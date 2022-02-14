<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'aaaa',
            'email' => 'aaaa@aaaa.com',
            'password' => bcrypt('aaaa')
        ]);

        DB::table('users')->insert([
            'name' => 'bbbb',
            'email' => 'bbbb@bbbb.com',
            'password' => bcrypt('bbbb')
        ]);

        DB::table('users')->insert([
            'name' => 'cccc',
            'email' => 'cccc@cccc.com',
            'password' => bcrypt('cccc')
        ]);
    }
}
