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
            'setting_value' => 'Site Title'
        ]);

         DB::table('settings')->insert([
            'setting_name' => 'register',
            'setting_value' => '1'
        ]);

         DB::table('settings')->insert([
            'setting_name' => 'email_activation',
            'setting_value' => '0'
        ]);
         
         DB::table('settings')->insert([
            'setting_name' => 'site_email',
            'setting_value' => 'me@localhost.dev'
        ]);

         DB::table('settings')->insert([
            'setting_name' => 'sitemap',
            'setting_value' => '0'
        ]);

         DB::table('settings')->insert([
            'setting_name' => 'rss',
            'setting_value' => '0'
        ]);
    }
}
