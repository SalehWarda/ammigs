<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('settings')->delete();


        $settings = [

            ['key' => 'current_session', 'value' => '2021-2022'],
            ['key' => 'company_name', 'value' => 'AMMIGS'],
            ['key' => 'phone', 'value' => '0123456789'],
            ['key' => 'address', 'value' => 'palestine'],
            ['key' => 'company_email', 'value' => 'info@ammigs.com'],
            ['key' => 'logo', 'value' => 'logo.png'],
        ];

        DB::table('settings')->insert($settings);
    }
}
