<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProfileTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('profile')->delete();

        $pics = array(
            '/img/schoolLogo/apc.jpg',      //1
            '/img/schoolLogo/pnu.jpg',      //2
            '/img/schoolLogo/nu.jpg',       //3
            '/img/schoolLogo/up.png',       //4
            '/img/schoolLogo/dlsu.jpg',     //5
            '/img/schoolLogo/feu.png',      //6
            '/img/schoolLogo/admu.png',     //7
            '/img/schoolLogo/csjl.png',     //8
            '/img/schoolLogo/hra.png',      //9
            '/img/schoolLogo/lpu.png',);   // 10
        $regions = array('NCR','NCR','NCR','R5','R1','R2','R3','R4A','R8','CAR');
        $i = 1;
        foreach ($pics as $pic) {
            factory(App\Profile::class)->create([
                'user_id' => $i,
                'picture' => $pic,
                'region' => $regions[$i-1],
            ]);
            $i++;
        }

        $fprofiles = DB::table('users')->where('type', '=', 'FACULTY')->get();
        foreach($fprofiles as $fprofile) {
            factory(App\Profile::class)->create([
                'user_id' => $fprofile->id,
            ]);
        }
    }
}