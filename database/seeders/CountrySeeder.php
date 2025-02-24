<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\CountryTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'id'=>1,
                'name_en'=>'Kwait',
                'name_ar'=>'كويت',
                'logo'=>'Kuwait.png',
                'sign'=>'KWD'
            ],

            [
                'id'=>2,

                'name_en'=>'Oman',
                'name_ar'=>'عمان',
                'logo'=>'Oman.png',
                'sign'=>'OMR'
            ],

            
            [
                'id'=>3,

                'name_en'=>'Qatar',
                'name_ar'=>'قطر',
                'logo'=>'Qatar.png',
                'sign'=>'QAR'
            ],   
            [
                'id'=>4,

                'name_en'=>'Bahrain',
                'name_ar'=>'البحرين',
                'logo'=>'Bahrain.png',
                'sign'=>'BHD'
            ],

            [
                'id'=>5,

                'name_en'=>'Emirates',
                'name_ar'=>'الامارات',
                'logo'=>'Arab.png',
                'sign'=>'AED'
            ],
            [
                'id'=>6,
                'name_en'=>'Saudi Arabia',
                'name_ar'=>'السعودية',
                'logo'=>'Saudi Arabia.png',
                'sign'=>'SAR'
            ],
        ];

        foreach($data as $d)
        {
            $country = Country::create([
                'id'=>$d['id'],
                'logo'=>$d['logo'],
                'sign'=>$d['sign']
            ]);

            CountryTranslation::create([
                'name'=>$d['name_en'],
                'locale'=>'en',
                'country_id'=>$country->id
            ]);
            CountryTranslation::create([
                'name'=>$d['name_ar'],
                'locale'=>'ar',
                'country_id'=>$country->id
            ]);
        }
    }
}
