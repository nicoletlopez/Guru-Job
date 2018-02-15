<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(FacultyTableSeeder::class);
        $this->call(HrTableSeeder::class);
        $this->call(JobTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
        $this->call(SkillTableSeeder::class);
    }
}
