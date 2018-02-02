<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
Use Illuminate\Support\Facades;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('user_type')->default('FACULTY')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        /*//create triggers to sort between HR and FACULTY
        DB::unprepared(
            'create trigger user_to_hr after insert on users 
            WHEN (new.user_type = \'HR\')
            BEGIN
            insert into hr values(new.user_id);
            END;');


        DB::unprepared(
            'create trigger user_to_faculty after insert on users
            WHEN (new.user_type = \'FACULTY\')
            BEGIN
            insert into faculty values(new.user_id);
            END;');

        //create a profile right after a user is created
        DB::unprepared(
            'create trigger create_user_profile after insert on users
            BEGIN
                insert into profile (user_id,user_name,email,created_at,updated_at 
                values(new.user_id,new.user_name,new.email,new.created_at,new.updated_at);
            END;');

        //edit the USER table after the PROFILE table has been edited
        DB::unprepared(
            'create trigger edit_user_table_after_edit_on_profile_table after update on profile
            BEGIN
                update user set user.name = new.name where user.id = new.id;
                update user set user.email = new.email where user.id = new.id;
            END;');*/

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        /*DB::unprepared('drop trigger if exists user_to_hr');
        DB::unprepared('drop trigger if exists user_to_faculty');
        DB::unprepared('drop trigger create_user_profile');
        DB::unprepared('drop trigger edit_user_table_after_edit_on_profile_table');*/
    }
}
