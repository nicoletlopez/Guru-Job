<?php

use Illuminate\Database\Seeder;
use App\DocumentSpace;

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

        $names = array('Résumé','Diploma','Transcript of Records');
        $docspaces = DocumentSpace::all();
        foreach($docspaces as $docspace)
        {
            for ($i = 0; $i < 3; $i++) {
                factory(App\Document::class)->create([
                    'name' => $names[$i],
                    'desc' => $docspace->faculty->user->name."'s ".$names[$i],
                    'document_space_id' => $docspace->id,
                ]);
            }
        }
    }
}
