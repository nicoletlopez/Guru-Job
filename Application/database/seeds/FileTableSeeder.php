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

        $lectures = DB::table('lectures')->get();

        foreach ($lectures as $lecture) {
            for ($x = 0; $x < 2; $x++) {
                factory(App\File::class)->create([
                    'lecture_id' => $lecture->id,
                ]);
            }
        }
    }
}
