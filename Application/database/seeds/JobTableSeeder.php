<?php

use Illuminate\Database\Seeder;

class JobTableSeeder extends Seeder
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
                    $wd = 'Mon, Thu';
                    break;
                case 1:
                    $wd = "Tue, Thu";
                    break;
                case 2:
                    $wd = 'Mon, Wed, Fri';
                    break;
                case 3:
                    $wd = "Mon, Tue, Thu, Fri";
                    break;
                case 4:
                    $wd = 'Mon';
                    break;
                case 5:
                    $wd = "Tue";
                    break;
                case 6:
                    $wd = 'Wed';
                    break;
                case 7:
                    $wd = "Sat";
                    break;
                case 8:
                    $wd = 'Mon, Thu, Sat';
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
