<?php

use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job')->delete();

        $users = DB::table('users')->inRandomOrder()->limit(15)->get();

        foreach ($users as $user) {
            $a = rand(0, 1);
            if ($a === 0) {
                $type = 'Part-Time';
            } else {
                $type = 'Full-Time';
            }

            $b = rand(0, 9);
            switch ($b) {
                case 0:
                    $wd = 'M TH';
                    break;
                case 1:
                    $wd = "T TH";
                    break;
                case 2:
                    $wd = 'M W F';
                    break;
                case 3:
                    $wd = "M T TH F";
                    break;
                case 4:
                    $wd = 'M';
                    break;
                case 5:
                    $wd = "T";
                    break;
                case 6:
                    $wd = 'W';
                    break;
                case 7:
                    $wd = "S";
                    break;
                case 8:
                    $wd = 'M TH S';
                    break;
                default:
                    $wd = 'TBA';
                    break;
            }

            factory(App\Job::class)->create([
                'user_id' => $user->id,
                'type' => $type,
                'work_days' => $wd,
            ]);
        }
    }
}
