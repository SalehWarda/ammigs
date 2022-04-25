<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Service::create([

            'service' => ['ar' => 'سياسة الخصوصية هنا',
                'en'=> 'Privacy here'],

            'service2' => ['ar' => 'شروط الخدمة هنا',
                'en'=> 'Usage policy here'],

            ]);
    }
}
