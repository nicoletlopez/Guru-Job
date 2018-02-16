<?php

use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subject')->delete();
        DB::update('UPDATE SQLITE_SEQUENCE SET seq = 0 WHERE name = "subject";');


        $hrs = DB::table('users')->where('type','=','HR')->get();

        foreach($hrs as $hr)
        {
            for ($x = 0; $x < 5; $x++)
            {
                $job = DB::table('job')->where('user_id','=',$hr->id)->inRandomOrder()->first();
                factory(App\Subject::class)->create([
                    'user_id' => $hr->id,
                    'job_id' => $job->id,
                ]);
            }
        }
    }
}
