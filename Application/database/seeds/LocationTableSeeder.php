<?php

use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = DB::table('users')->get();

        foreach($users as $user)
        {
            DB::table('location')->insert(
                [
                    'user_id' => $user->user_id,
                    'location_name' => str_random(10)
                ]);
        }
    }
}
