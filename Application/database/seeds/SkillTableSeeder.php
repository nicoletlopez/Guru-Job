<?php

use Illuminate\Database\Seeder;

class SkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('skill')->insert([
            'name' => "Java Programming",
            'desc' => "Programming using the Java language"
        ]);

        DB::table('skill')->insert([
            'name' => "Data Networks",
            'desc' => "Network and internet basics"
        ]);

        DB::table('skill')->insert([
            'name' => "Embedded Devices",
            'desc' => "Arduino and Raspberry Pi programming"
        ]);
    }
}
