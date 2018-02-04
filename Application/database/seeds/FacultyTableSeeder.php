<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2/4/2018
 * Time: 10:23 AM
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultyTableSeeder extends Seeder
{
    public function run()
    {
        $faculties = DB::table('users')->where('user_type','FACULTY')->get();
        foreach($faculties as $faculty)
        {
            DB::table('faculty')->insert([
                'faculty_id' => $faculty->user_id
            ]);
        }
        /*DB::table('faculty')->insert([
            'faculty_id' => 1,
        ]);*/
    }
}