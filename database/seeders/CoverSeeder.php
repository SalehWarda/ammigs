<?php

namespace Database\Seeders;

use App\Models\Cover;
use Illuminate\Database\Seeder;

class CoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Cover::create([

            'title' => ['ar' => 'هل أنت من عشاق ألعاب المافيا ؟' , 'en' => '? Are you a fan of mafia games'],
            'description' => ['ar' => 'لعبة "إنتقام المافيا" الأولى في عالم الألعاب التي تركز بشكل خاص على الشق الإستراتيجي الحربي في عالم المافيا الغامض (أسلحة, قتل, إنتقام) وصراعات حية بين زعماء المافيا وأسياد العالم السفلي في رحلة البحث عن السلطة والقوة.',

                'en' => '"Mafia Revenge"

has become the first game in the gaming world that focuses specifically war in the mafia world (weapons, revenge) and live conflicts in the search for power and strength.'
                ]

        ]);
    }
}
