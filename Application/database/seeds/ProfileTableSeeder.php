<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProfileTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('profile')->delete();
        $profiles = DB::table('users')->get();
        foreach($profiles as $profile)
        {
            factory(App\Profile::class)->create([
                'user_id' => $profile->id,
            ]);
        }//        DB::table('profile')->insert([
//            'user_id' => 1,
//            'user_description' => "This is profile of the user Pamity",
//            'dob' => Carbon::now(),
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now(),
//        ]);
//
//        DB::table('profile')->insert([
//            'user_id' => 2,
//            'user_description' => "This is profile of the user Nicole",
//            'dob' => Carbon::now(),
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now(),
//        ]);
    }
}