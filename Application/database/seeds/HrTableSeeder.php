<?php

use Illuminate\Database\Seeder;

class HrTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hr')->delete();

        $hrs = DB::table('users')->where('type', '=' ,'HR')->get();
        foreach($hrs as $hr)
        {
            DB::table('hr')->insert([
                'user_id' => $hr->id,
                'balance' => random_int(1000,3000)
            ]);
        }
    }
}
