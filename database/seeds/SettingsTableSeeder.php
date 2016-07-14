<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         DB::table('settings')->insert([
            'setting_name' => 'site_name',
            'value' => '1'
        ]);

         DB::table('settings')->insert([
            'setting_name' => 'Site_Description',
            'value' => '1'
        ]);

         DB::table('settings')->insert([
            'setting_name' => 'users_can_register',
            'value' => '1'
        ]);

         DB::table('settings')->insert([
            'setting_name' => 'email_send_password',
            'value' => '0'
        ]);
         
         DB::table('settings')->insert([
            'setting_name' => 'admin_email',
            'value' => '0'
        ]);

         DB::table('settings')->insert([
            'setting_name' => 'sitemap',
            'value' => '0'
        ]);

         DB::table('settings')->insert([
            'setting_name' => 'rss',
            'value' => '0'
        ]);
    }
}
