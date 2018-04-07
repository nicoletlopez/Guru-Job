<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class ProfileTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('profile')->delete();
        DB::table('resume')->delete();

        $descriptions = $this->descArray();
        $pics = $this->picArray();
        $regions = array('NCR', 'NCR', 'NCR', 'R5', 'R1', 'R2', 'R3', 'R4A', 'R8', 'CAR');
        $sectionTitles = array('Education', 'Work Experience', 'Skills');
        for ($x = 0; $x < 10; $x++) {
            factory(App\Profile::class)->create([
                'user_id' => $x + 1,
                'picture' => $pics[$x],
                'description' => $descriptions[$x],
                'region' => $regions[$x],
                'contact_number' => '09' . rand(10, 99) . ' ' . rand(100, 999) . ' ' . rand(1000, 9999)
            ]);
        }

        $fprofiles = User::where('type', '=', 'FACULTY')->where('name', '<>', 'Pamity')->get();
        foreach ($fprofiles as $fprofile) {
            factory(App\Profile::class)->create([
                'user_id' => $fprofile->id,
                'contact_number' => '09' . rand(10, 99) . ' ' . rand(100, 999) . ' ' . rand(1000, 9999)
            ]);

            $resume = factory(App\Resume::class)->create([
                'faculty_id' => $fprofile->id,
            ]);

            $content = [
                'Studied at ' . $this->getSchool(),
                'Proficient in ' . $this->getSkill() . ' language',
            ];
            factory(App\Section::class)->create([
                'title' => $sectionTitles[0],
                'content' => $content[0],
                'resume_id' => $resume->id,
            ]);
            factory(App\Section::class)->create([
                'title' => $sectionTitles[1],
                'resume_id' => $resume->id,
            ]);
            factory(App\Section::class)->create([
                'title' => $sectionTitles[2],
                'content' => $content[1],
                'resume_id' => $resume->id,
            ]);
        }

        $pam = User::where('name', '=', 'Pamity')->first();
        factory(App\Profile::class)->create([
            'user_id' => $pam->id,
            'picture' => '/img/schoolLogo/pamity.png',
            'contact_number' => '09' . rand(10, 99) . ' ' . rand(100, 999) . ' ' . rand(1000, 9999),
        ]);
    }

    private function getSchool()
    {
        $schools = array(
            'Asia Pacific College',
            'Philippine Normal University',
            'National University',
            'University of the Philippines Diliman',
            'De La Salle University',
            'Far Eastern University',
            'Ateneo De Manila University',
            'Colegio De San Juan De Letran',
            'Holy Rosary Academy',
            'Lyceum of the Philippines University');

        return $schools[array_rand($schools)];
    }

    private function getSkill()
    {
        $skills = ['Java',
            'Python',
            'C',
            'Ruby',
            'JavaScript',
            'C#',
            'PHP',
            'Objective-C',
            'SQL',];

        return $skills[array_rand($skills)];
    }

    private function picArray()
    {
        return array(
            '/img/schoolLogo/apc.jpg',      //1
            '/img/schoolLogo/pnu.jpg',      //2
            '/img/schoolLogo/nu.jpg',       //3
            '/img/schoolLogo/up.png',       //4
            '/img/schoolLogo/dlsu.jpg',     //5
            '/img/schoolLogo/feu.png',      //6
            '/img/schoolLogo/admu.png',     //7
            '/img/schoolLogo/csjl.png',     //8
            '/img/schoolLogo/hra.png',      //9
            '/img/schoolLogo/lpu.png',);   // 10
    }

    private function descArray()
    {
        return array('Asia Pacific College (APC) was established in 1991 as a non-profit joint venture between IBM Philippines and the SM Foundation. It was envisioned as a learning institution that produces graduates who fulfill information technology industry demands.

Asia Pacific College emphasizes industry-academe links, orienting their programs and faculty toward industry needs. APC\'s cornerstones are its IT curriculum, industry-experienced faculty and its six-month internship program.

        Asia Pacific College is one of the four Centers of Excellence in IT Education in the Philippines.',
            'The Philippine Normal University (PNU) was originally established as the Philippine Normal School (PNS) by virtue Act No. 74 of the Philippine Commission. Enacted on 21 January 1901, Act No. 74 mandated for the establishment of a normal and trade school. The Philippine Normal School formally opened on 1 September 1901, as an institution for the training of teachers.',
            'National University (NU) is a non–sectarian coeducational institution in Sampaloc, Manila, Philippines. The founder of the University, Don Mariano Fortunato Jhocson established the institution in August 1, 1900 as Colegio Filipino in Quiapo, Manila. It is considered as the first private nonsectarian and coeducational institution in the Philippines and also, the first university to use English as its medium of instruction, replacing Spanish language.',
            'The University of the Philippines (UP) is the country’s national university. This premier institution of higher learning was established in 1908 and is now a university system composed of eight constituent universities and one autonomous college spread throughout 17 campuses in the archipelago.',
            'De La Salle University positions itself as a leader in molding human resources who serve the church and the nation. It is a Catholic coeducational institution founded in 1911 by the Brothers of the Christian Schools. The University is a hub for higher education training renowned for its academic excellence, prolific and relevant research, and involved community service.',
            'Since its establishment in 1928 by founder Dr. Nicanor Reyes, Sr., FEU has been recognized as one of the leading universities in the Philippines. The first Accountancy and Business school for Filipinos, the university has, through the years, expanded its course offerings to the Arts and Sciences, Architecture and Fine Arts, Education, Engineering and Computer Studies (FEU Institute of Technology), Graduate Studies, Law, and Medicine (FEU-Nicanor Reyes Medical Foundation).',
            'To understand the soul of the Ateneo de Manila University -- what shaped it and where it came from, where it is going and where it can take you -- it is essential to understand its motto, Lux in Domino, or "Light in the Lord."',
            'We are COLEGIO DE SAN JUAN DE LETRAN. We area a Catholic School committed to Dominican Preaching through Education towards the integral formation of the Human Person in the noble tradition of knightly excellence with a special devotion to Mary according to the ideal of DEUS, PATRIA, LETRAN. ',
            'Our Vision is a School for Virtue Centered Leadership. Our Mission is developing lifelong learners and leaders with character and competence. Our Slogan is "At HRA, every learner is a leader".',
            'Lyceum of the Philippines University prides itself with its long and rich tradition of Academic excellence through the legacy of its founder, Dr. Jose P. Laurel. The only Philippine President to have served in all three branches of the Government, Dr. Laurel was a successful lawyer, legislator, constitutionalist, jurist, writer, scholar, statesman, philosopher, and above all things, an educator.',);
    }
}