<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Kostumer;

class KostumerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 10; $i++)
        {
            Kostumer::insert([
                'kostumer_nama'     => $faker->name(),
                'kostumer_alamat'   => $faker->address(),
                'kostumer_jk'       => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'kostumer_hp'       => $faker->phoneNumber(),
                'kostumer_ktp'      => $faker->numerify('############'),
            ]);
        }
    }
}
