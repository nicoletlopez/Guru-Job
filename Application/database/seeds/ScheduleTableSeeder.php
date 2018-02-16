<?php

use Illuminate\Database\Seeder;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedule')->delete();
        DB::update('UPDATE SQLITE_SEQUENCE SET seq = 0 WHERE name = "subject";');


        $subjects = DB::table('subject')->get();

        foreach ($subjects as $subject){
            $day = array('MON','TUE','WED','THU','FRI','SAT','SUN');
            factory(App\Schedule::class)->create([
                'subject_id' => $subject->id,
                'day' => $day[array_rand($day)],
            ]);
        }
    }
}
