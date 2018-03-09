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
        DB::table('job')->delete();
        DB::update('UPDATE SQLITE_SEQUENCE SET seq = 0 WHERE name = "job";');

        $subjects = $this->subjectArray();
        $hrs = DB::table('users')->where('type','=','HR')->get();
        $FTMinSal = [10000];
        $PTMinSal = [500];
        for($i = 0; $i < 20; $i++){
            array_push($FTMinSal, end($FTMinSal)+1000);
            array_push($PTMinSal, end($PTMinSal)+50);
        }
        $n = 0;

        foreach($hrs as $hr)
        {
            for ($x = 0; $x < 5; $x++)
            {
                //Create a Job row
                $a = rand(0, 1);
                if ($a === 0) {
                    $type = 'FT';
                    $floorSalary = $this->minimumSalary($FTMinSal);
                    $ceilingSalary = $floorSalary + 5000;
                } else {
                    $type = 'PT';
                    $floorSalary = $this->minimumSalary($PTMinSal);
                    $ceilingSalary = $floorSalary + 300;
                }

                $job = factory(App\Job::class)->create([
                    'title' => $this->titleTemplate($subjects[$n]),
                    'desc' => $this->descTemplate($hr->name,$subjects[$n]),
                    'floor_salary' => $floorSalary,
                    'ceiling_salary' => $ceilingSalary,
                    'user_id' => $hr->id,
                    'type' => $type,
                ]); //Created a Job row

                //Create Subject row
                factory(App\Subject::class)->create([
                    'name' => $subjects[$n],
                    'desc' => 'The title of this subject is '.$subjects[$n],
                    'user_id' => $hr->id,
                    'job_id' => $job->id,
                ]);//Created subject row
                $n++;
            }
        }
    }

    private function subjectArray(){
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

        shuffle($subjects);
        return $subjects;
    }

    private function titleTemplate($subject){
        $r = rand(1,10);
        if ($r == 1){
            return 'Hiring '.$subject.' Teacher.';
        }elseif ($r == 2){
            return 'Looking for Experienced Teacher on '.$subject;
        }elseif ($r == 3){
            return $subject.' Teacher Needed';
        }elseif ($r == 4){
            return 'Grab the chance to be a '.$subject.' Teacher!';
        }elseif ($r == 5){
            return 'We need someone to teach '.$subject;
        }elseif ($r == 6){
            return $subject.' Teacher needed urgently!';
        }elseif ($r == 7){
            return 'Hiring a teacher for '.$subject;
        }elseif ($r == 8){
            return $subject.' Teacher';
        }elseif ($r == 9){
            return 'Teacher for subject '.$subject;
        }else{
            return 'Apply now for a chance to teach '.$subject;
        }
    }

    private function descTemplate($school, $subject){
        $r = rand(1,7);
        if ($r == 1){
            return 'We of '.$school.' seek the help of capable hands that are willing to share their knowledge in the area of '
                .$subject.'. If you are willing, come and sign up. We won\'t bite. You\'ll get paid big time for teaching part-time. '.
                'Your duties include getting the students to learn about '.$subject.' and other tasks which you will be briefed about '.
                'when you report for duty. We await your arrival.';
        }elseif ($r == 2){
            return 'The prestigious school of '.$school.' is looking for part-time teachers to teach one of our subject '.'
            offering, which is '.$subject.'. You are not required to work full time; only half time also known as part time. '.
                'We hope you are willing to share your talents and knowledge to aspiring students of '.$subject.'.';
        }elseif ($r == 3){
            return 'This term, for the first time in the history of '.$school.', we are offering a subject called '.
                $subject.'! For the first few applicants, we are willing to negotiate about the price of the pay, but '.
                'for the rest, woe be to you for you are late in the uptake to pick up opportunities when they come your '.
                'way. You may be hired by others but you\'ve already missed the opportunity of your life when you didn\'t '.
                'apply for this. Hopefully we can work toghether for a long time to come, we are eagerly waiting for your '.
                'wonderful talent in teaching to shine in our school! :D';
        }elseif ($r == 4){
            return $subject.' is currently being offered in our school. Your duties will include teaching the students, '.
                'keeping track of their performance so as to ensure they learn the proper way of doing things pertaining '.
                'to this subject. The goal is to teach in such a way that the students can use the knowledge they gained '.
                'in this subject and apply it in real life situations. We of '.$school.' humbly await your application '.
                'and we will scrutinize it and see if you are worthy of the job.';
        }elseif ($r == 5){
            return 'A teacher Creates and delivers engaging lessons to diverse groups of students at all levels. '.
                'Promotes enthusiasm for learning and for subjects. Adheres to national curriculum standards. Collects '.
                'and reports on correct and detailed records of student performance. Maintains classroom order. If YOU '.
                'have this characteristics, we of '.$school.' would like to invite you to teach '.$subject.' in our school.'.
                'We hope to see your favourable response to our call.';
        }elseif ($r == 6){
            return $school.'\'s staff and children would like to invite dynamic, effective and aspiring teachers who '.
                'are passionate about learning to join our school. The post will focus on '.$subject.'.We are looking '.
                'for teachers who have the ability to be excellent practitioners with high expectations and a commitment '.
                'to raising standards; Excellent classroom management and be proficient in planning, assessment and '.
                'target setting so that all children';
        }else{
            return 'The '.$school.' invites applications from experienced teachers, who wish to join our happy, '.
                'successful and hardworking school. We are looking for an active, enthusiastic and creative teacher '.
                'to teach'.$subject.' class. The school has a strong commitment to creative learning and the outside '.
                'curriculum. We are looking for a practitioner who is committed to nurturing the development of young '.
                'children and is able to establish a rapport with children and parents and  as a commitment to inclusive'.
                ' education and a genuine desire to work co-operatively with parents, key school staff and other professionals.';
        }
    }

    public function minimumSalary($minSal){
            return $minSal[array_rand($minSal)];
    }
}
