<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Mobil;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $faker->addProvider(new \Faker\Provider\FakeCar($faker));

        for ($i = 1; $i <= 10; $i++)
        {
            Mobil::insert([
                'mobil_merk'    => $faker->vehicle(),
                'mobil_plat'    => $faker->vehicleRegistration(),
                'mobil_warna'   => $faker->colorName(),
                'mobil_tahun'   => $faker->numberBetween($min = 1990, $max = 2021),
                'mobil_status'  => 1,
            ]);
        }
    }
}
