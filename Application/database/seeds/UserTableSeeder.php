<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\User::class,20)->create([
            'user_type' => 'HR'
        ]);
        factory(App\User::class,20)->create();
//        for($x =0; $x<50; $x++)
//        {
//            DB::table('users')->insert([
//                'name' => str_random(10),
//                'email' => str_random(10) . '@gmail.com',
//                'password' => bcrypt('secret'),
//                'user_type' => 'FACULTY',
//                'created_at' => date("Y-m-d H:i:s"),
//                'updated_at' => date("Y-m-d H:i:s"),
//            ]);
//        }
//
//        for($x =0; $x<50; $x++)
//        {
//            DB::table('users')->insert([
//                'name' => str_random(10),
//                'email' => str_random(10) . '@gmail.com',
//                'password' => bcrypt('secret'),
//                'user_type' => 'HR',
//                'created_at' => date("Y-m-d H:i:s"),
//                'updated_at' => date("Y-m-d H:i:s"),
//            ]);
//        }
        /*DB::table('users')->insert(
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

            ]);*/
    }
}