<?php

use Illuminate\Database\Seeder;

class HeatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('pl_PL');

        for($i=1; $i<=500; $i++){
            DB::table('heating')->insert([
                'energy' => $faker->randomElement(['gaz', 'solar', 'prąd', 'olej', 'węgiel', 'pompa ciepła']),
                'heating_type' => $faker->randomElement(['piec', 'ogrzewanie centralne', 'ogrzewanie podłogowe']),
                'advert_id' => $faker->unique()->numberBetween(1, 500),
            ]);
        }
    }
}
