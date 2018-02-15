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
        DB::table('faculty')->delete();
        $faculties = DB::table('users')->where('type','=','FACULTY')->get();
        foreach($faculties as $faculty)
        {
            DB::table('faculty')->insert([
                'user_id' => $faculty->id,
            ]);
        }
        /*DB::table('faculty')->insert([
            'faculty_id' => 1,
        ]);*/
    }
}