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
        //
        $hrs = DB::table('users')->where('user_type','=','HR')->get();
        foreach($hrs as $hr)
        {
            DB::table('hr')->insert([
                'hr_id' => $hr->user_id,
                'balance' => random_int(1000,3000)
            ]);
        }
    }
}
