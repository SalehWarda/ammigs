<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Contact::create([

            'contact_description' => ['ar' => 'اهلا وسهلا بكم يمكنكم التواصل من هنا',
                'en'=> 'Welcome you can message us here'],

                'address' => 'Gaza,Palestine',
                'phone' => '123123123',
                'email' => 'ammigs@gmail.com'

        ]);
    }
}
