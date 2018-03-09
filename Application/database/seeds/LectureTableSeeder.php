<?php

use Illuminate\Database\Seeder;
use App\Faculty;
use App\Subject;

class LectureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lecture')->delete();
        DB::update('UPDATE SQLITE_SEQUENCE SET seq = 0 WHERE name = "lecture";');

        $owners = Faculty::all();
        foreach ($owners as $owner) {
            $subject = Subject::inRandomOrder()->first()->name;
            factory(App\Lecture::class)->create([
                'title' => 'Lecture for '.$subject,
                'overview' => 'This lecture aims to teach '.$subject.' in a comprehensive manner.',
                'objectives' => '(1) Learn about '.$subject.' (2) Learn more about '.$subject,
                'owner_id' => $owner->user_id,
            ]);
        }
    }
}
