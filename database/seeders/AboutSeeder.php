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

            'about' => ['ar' => 'تأسست AMMIGS  في عام 2022, وكانت في طليعة الشركات المصنعة والمطورة للألعاب وقد تطورت من شركة

صغيرة غير معروفة إلى شركة رائدة في صناعة العاب الموبايل. كقوة عملاقة لصناعة الألعاب في الشرق الأوسط, فهي

تتوسع اليوم بشكل سريع في السوق العالمية, لتوفر مجموعة متنوعة من الألعاب ساعية لتحقيق أفضل النتائج عالميا



كما ستواصل AMMIGS تطوير أفضل الألعاب الممتعة والفريدة لإثراء عالم الألعاب العالمي وجعله أكثر تنوع وحيوية

كما تتمتع بقوة كافية لتحقيق أهدافها والاستمرار في التأثير على صناعة ألعاب الموبايل في السنوات المستقبلية القادمة و

كل ذلك بفضل امتلاكها لفريق عمليات وتطوير قوي وبالإضافة إلى الدهود الدؤوبة التي يبذلها فريق الدعم لديها.

',
                'en' => 'AMMIGS, founded in 2022, is a globally integrated net technology corporation dedicted to bringing the best in online entertainment to gamers the world over, The games developed and released through the years, now available in 18 languages, have consistently topped the coveted Most Popular Games, and Best Game of the Year on the App Store and Google Play Store respectively.

'],


            'image' => 'about.png'
        ]);
    }
}
