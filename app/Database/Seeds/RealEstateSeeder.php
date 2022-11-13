<?php

namespace App\Database\Seeds;

use App\Models\RealEstateModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class RealEstateSeeder extends Seeder
{
    public function run()
    {
        $realEstateModel = new RealEstateModel();
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 52; $i++) {
            $realEstateModel->save(
                [
                    'title'       =>    $faker->company,
                    'image'       =>    '/assets/img/' .$faker->numberBetween(1,3) . '.jpg',
                    'address'     =>    $faker->address,
                    'price'       =>    $faker->randomFloat(2, 250, 2500),
                    'size'        =>    $faker->numberBetween(10, 150),
                    'created_at'  =>    Time::createFromTimestamp($faker->unixTime())
                ]
            );
        }
    }
}
