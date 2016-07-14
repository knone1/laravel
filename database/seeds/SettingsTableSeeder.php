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
            'setting_name' => 'Site Name',
            'setting_desc' => 'The name of the site',
            'setting_value' => 'Site Title'
        ]);

         DB::table('settings')->insert([
            'setting_name' => 'Register',
            'setting_desc' => 'Enable <b>1</b> Disable <b>0</b> the Registration',
            'setting_value' => '1'
        ]);

         DB::table('settings')->insert([
            'setting_name' => 'Emial Activation',
            'setting_desc' => 'Enable <b>1</b> Disable <b>0</b> the Email Send to user',
            'setting_value' => '0'
        ]);
         
         DB::table('settings')->insert([
            'setting_name' => 'Site Email',
            'setting_desc' => 'The email of the site',
            'setting_value' => 'me@localhost.dev'
        ]);

         DB::table('settings')->insert([
            'setting_name' => 'sitemap',
            'setting_desc' => 'Enable <b>1</b> Disable <b>0</b> the Sitemap',
            'setting_value' => '0'
        ]);

         DB::table('settings')->insert([
            'setting_name' => 'rss',
            'setting_desc' => 'Enable <b>1</b> Disable <b>0</b> the RSS',
            'setting_value' => '0'
        ]);
    }
}
