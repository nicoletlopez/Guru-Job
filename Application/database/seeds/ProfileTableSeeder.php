<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProfileTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('profile')->delete();
        $fprofiles = DB::table('users')->where('type', '=', 'FACULTY')->get();
        foreach($fprofiles as $fprofile) {
            factory(App\Profile::class)->create([
                'user_id' => $fprofile->id,
            ]);
        }

        $hprofiles = DB::table('users')->where('type', '=', 'HR')
//            ->andWhere('name', '<>', 'Asia Pacific College')
//            ->andWhere('name', '<>', 'Philippine Normal University')
//            ->andWhere('name', '<>', 'National University')
            ->get();

        $pics = array('/img/schoolLogo/apc.jpg',
                            '/img/schoolLogo/pnu.jpg',
                            '/img/schoolLogo/nu.jpg');
        $regions = array('NCR','R4A','CAR');
        $i = 1;
        foreach ($pics as $pic) {
            factory(App\Profile::class)->create([
                'user_id' => $i,
                'picture' => $pic,
                'region' => $regions[$i-1],
            ]);
            $i++;
        }

//        foreach ($hprofiles as $hprofile) {
//            factory(App\Profile::class)->create([
//                'user_id' => $hprofile->id,
//            ]);
//        }
        //        DB::table('profile')->insert([
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