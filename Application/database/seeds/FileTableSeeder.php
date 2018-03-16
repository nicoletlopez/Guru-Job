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

        $ext = ['jpg', 'jpeg', 'png', 'bmp', 'gif', 'mp4', 'flv', 'wmv', '3gp', 'mp3',
            'm4a', 'm4p', 'ogg', 'wav', 'doc', 'docx', 'pdf'];

        foreach ($lectures as $lecture) {
            for ($x = 0; $x < 2; $x++) {
                factory(App\File::class)->create([
                    'name' => 'Lesson ' . ($x + 1) . ' for ' . substr($lecture->title, 12).'.'.$ext[array_rand($ext)],
                    'lecture_id' => $lecture->id,
                ]);
            }
        }
    }
}
