<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => '$2y$10$aSjo8CaykQTF4c.S0RemUuhBhTpq5.Jb8Mg.YMLGFk8wPBNDtsGW2', //pasword => 123456
            'email' => 'admin@localhost.dev',
            'facebook_user_id' => '0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
