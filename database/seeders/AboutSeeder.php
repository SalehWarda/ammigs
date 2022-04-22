<?php

namespace Database\Seeders;

use App\Models\about;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      about::create([

          'about' => ['ar'=>'نبذة عن شركة الالعاب','en'=>'About Ammags'],
          'image' => 'about.png'
      ]);
    }
}
