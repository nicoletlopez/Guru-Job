<?php

use Illuminate\Database\Seeder;

class DocumentSpaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_space')->delete();
        DB::update('UPDATE SQLITE_SEQUENCE SET seq = 0 WHERE name = "document_space";');

        $faculties = DB::table('users')->where('type','=','FACULTY')->get();
        foreach($faculties as $faculty)
        {
            factory(App\DocumentSpace::class)->create([
                'title' => $faculty->name."'s Documents'",
                'desc' => 'This is '.$faculty->name."'s Document Space'",
                'user_id' => $faculty->id,
            ]);
        }
    }
}
