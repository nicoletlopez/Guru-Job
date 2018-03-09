<?php

use Illuminate\Database\Seeder;
use App\Lecture;

class FileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('file')->delete();
        DB::update('UPDATE SQLITE_SEQUENCE SET seq = 0 WHERE name = "file";');

        $lectures = Lecture::all();

        foreach ($lectures as $lecture) {
            for ($x = 0; $x < 2; $x++) {
                factory(App\File::class)->create([
                    'name' => 'Lesson '.($x+1).' for '. substr($lecture->title,12),
                    'lecture_id' => $lecture->id,
                ]);
            }
        }
    }
}
