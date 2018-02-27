<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

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
            $min = array(0,15,30,45);
            $start = Carbon::createFromTime($hour = rand(7,17), $set = $min[array_rand($min)], 0, 'Asia/Manila');
            $end = Carbon::createFromTime($hour + 2, $set, 0, 'Asia/Manila');
            factory(App\Schedule::class)->create([
                'subject_id' => $subject->id,
                'day' => $day[array_rand($day)],
                'start' => $start->format('H:i'),
                'end' => $end->format('H:i'),
            ]);
        }
    }
}
