<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('hr')->delete();
        DB::table('faculty')->delete();
        DB::table('users')->delete();
        //Delete the following code when migrating to another database engine
        //This is specific to SQLITE
        DB::update('UPDATE SQLITE_SEQUENCE SET seq = 0 WHERE name = "users";');



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
        foreach ($schools as $school) {
            $words = explode(" ", $school);
            $acronym = "";
            foreach ($words as $w) {
                $acronym .= $w[0];
            }
            $acronym = strtolower($acronym);
            DB::table('users')->insert(
                [
                    'name' => $school,
                    'email' => $acronym.'@mail.com',
                    'password' => bcrypt('secret'),
                    'type' => 'HR',
                    'remember_token' => str_random(10),
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
        }

        factory(App\User::class,20)->create();

        DB::table('users')->insert([
                'name' => 'Pamity',
                'email' => 'pamity@mail.com',
                'password' => bcrypt('secret'),
            ]);

//        for($x =0; $x<50; $x++)
//        {
//            DB::table('users')->insert([
//                'name' => str_random(10),
//                'email' => str_random(10) . '@gmail.com',
//                'password' => bcrypt('secret'),
//                'user_type' => 'FACULTY',
//                'created_at' => date("Y-m-d H:i:s"),
//                'updated_at' => date("Y-m-d H:i:s"),
//            ]);
//        }
//
//        for($x =0; $x<50; $x++)
//        {
//            DB::table('users')->insert([
//                'name' => str_random(10),
//                'email' => str_random(10) . '@gmail.com',
//                'password' => bcrypt('secret'),
//                'user_type' => 'HR',
//                'created_at' => date("Y-m-d H:i:s"),
//                'updated_at' => date("Y-m-d H:i:s"),
//            ]);
//        }
        /*DB::table('users')->insert(
            [
                'name' => 'Pamity',
                'email' => 'pamity@mail.com',
                'password' => bcrypt('pampam'),
                'user_type' => 'FACULTY',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        DB::table('users')->insert(
            [
                'name' => 'Nicole',
                'email' => 'nicole@mail.com',
                'password' => bcrypt('password'),
                'user_type' => 'HR',
                'created_at' => now(),
                'updated_at' => now(),

            ]);
        DB::table('users')->insert(
            [
                'name' => 'Jason',
                'email' => 'jason@mail.com',
                'password' => bcrypt('password'),
                'user_type' => 'HR',
                'created_at' => now(),
                'updated_at' => now(),

            ]);*/
    }
}