<?php

use Illuminate\Database\Seeder;
use App\Faculty;

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
            factory(App\Lecture::class)->create([
                'owner_id' => $owner->user_id,
            ]);
        }
    }
}
