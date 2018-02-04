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
            'skill_name' => "Java Programming",
            'skill_description' => "Programming using the Java language"
        ]);

        DB::table('skill')->insert([
            'skill_name' => "Data Networks",
            'skill_description' => "Network and internet basics"
        ]);

        DB::table('skill')->insert([
            'skill_name' => "Embedded Devices",
            'skill_description' => "Arduino and Raspberry Pi programming"
        ]);
    }
}
