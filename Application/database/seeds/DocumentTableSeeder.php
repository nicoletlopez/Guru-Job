<?php

use Illuminate\Database\Seeder;

class DocumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document')->delete();
        DB::update('UPDATE SQLITE_SEQUENCE SET seq = 0 WHERE name = "document";');

        $faculties = DB::table('users')->where('type','=','FACULTY')->get();
        foreach($faculties as $faculty)
        {
            factory(App\Document::class,rand(1,5))->create([
                'user_id' => $faculty->id,
            ]);
        }
    }
}
