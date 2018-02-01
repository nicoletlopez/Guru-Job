<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Pamity',
                'email' => 'pamity@mail.com',
                'password' => bcrypt('pampam'),
                'user_type' => 'FACULTY',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        DB::table('users')->insert(
            [
                'name' => 'Nicole',
                'email' => 'nicole@mail.com',
                'password' => bcrypt('password'),
                'user_type' => 'HR',
                'created_at' => now(),
                'updated_at' => now(),

            ]);
        DB::table('users')->insert(
            [
                'name' => 'Jason',
                'email' => 'jason@mail.com',
                'password' => bcrypt('password'),
                'user_type' => 'HR',
                'created_at' => now(),
                'updated_at' => now(),

            ]);
    }
}