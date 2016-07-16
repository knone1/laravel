<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('roles')->insert([
            'role_user_id' => '1', //set to user faker admin
            'role_title' => 'Administrator',
            'role_level' => '5' //5 admin 4 moderator 3 what you want to 2 and 1, 0 = user
        ]);
    }
}
