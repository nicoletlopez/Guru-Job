<?php

use Illuminate\Database\Seeder;

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
        factory(App\File::class,20)->create();
    }
}
