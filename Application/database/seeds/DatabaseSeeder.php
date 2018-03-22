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
        $this->call(SpecializationTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
        $this->call(ScheduleTableSeeder::class);
        $this->call(LectureTableSeeder::class);
        $this->call(FileTableSeeder::class);
        $this->call(DocumentSpaceTableSeeder::class);
        $this->call(DocumentTableSeeder::class);
    }
}
