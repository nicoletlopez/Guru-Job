<?php

use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subject')->delete();
        DB::update('UPDATE SQLITE_SEQUENCE SET seq = 0 WHERE name = "subject";');

        $subjects = ['2D Animation',
            '3D Animation',
            '3D Modeling',
            'Advanced Accounting',
            'Analytics Techniques, Tools & Application',
            'Applied Project',
            'Art Appreciation',
            'Auditing and Assurance Services',
            'Fundamentals of Predictive Analytics',
            'Behavioral Science',
            'Brand Management',
            'Business Law',
            'Cloud Administration & Management',
            'Computerized Analytics Information Systems',
            'Cognitive Psychology',
            'Principles of Communication',
            'Methods of Research for Computer Engineering ',
            'Methods of Research for Computer Science',
            'Data Structures',
            'Database Management',
            'Mechanics of Deformable Bodies',
            'Digital Media in Social Context',
            'Network Security, Storage and Data Comm',
            'Special Topics in Electronics Engineering',
            'Economics, Taxation and Land Reform',
            'Macro Economics',
            'Ecotourism',
            'English Enrichment Program',
            'Expository Writing',
            'Grammar and Composition Development',
            'Intensive Electronics Engineering Program',
            'Electronic Devices and Circuits Lab',
            'Fundamentals of Material Science and Engineering',
            'Entrepreneurship for Engineering',
            'Oral Communication in English',
            'Research Writing ',
            'Intensive Electronic Systems & Techs',
            'Technical Writing',
            'Events Management',
            'Panitikang Pilipino',
            'Game Art Production',
            'Intensive General Engineering and Applied Sciences Program',
            'Analytic and Solid Geometry',
            'Graphical System Design Lab',
            'Philippine History',
            'Introduction to Programming Languages',
            'Introduction to Programming Languages',
            'Logic Circuits and Switching Theory',
            'Multimedia Production',
            'Marketing Communications',];
        $hrs = DB::table('users')->where('type','=','HR')->get();
        $n = 0;

        foreach($hrs as $hr)
        {
            for ($x = 0; $x < 5; $x++)
            {
                $job = DB::table('job')->where('user_id','=',$hr->id)->inRandomOrder()->first();
                factory(App\Subject::class)->create([
                    'name' => $subjects[$n],
                    'desc' => 'The title of this subject is '.$subjects[$n],
                    'user_id' => $hr->id,
                    'job_id' => $job->id,
                ]);
                $n++;
            }
        }
    }
}
