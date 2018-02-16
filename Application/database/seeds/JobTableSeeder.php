<?php

use Illuminate\Database\Seeder;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job')->delete();
        DB::update('UPDATE SQLITE_SEQUENCE SET seq = 0 WHERE name = "job";');

        $hrs = DB::table('hr')->inRandomOrder()->limit(15)->get();

        foreach ($hrs as $hr) {
            for ($k = 0 ; $k < 2; $k++){
                $a = rand(0, 1);
                if ($a === 0) {
                    $type = 'PT';
                } else {
                    $type = 'FT';
                }

                factory(App\Job::class)->create([
                    'user_id' => $hr->user_id,
                    'type' => $type,
                ]);
            }
        }
    }
}