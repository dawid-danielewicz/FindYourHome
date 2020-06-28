<?php

use Illuminate\Database\Seeder;

class CostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('pl_PL');

        for($i=1; $i<=250; $i++){
            DB::table('costs')->insert([
                'rent' => $faker->numberBetween(200, 1500),
                'deposit' => $faker->numberBetween(1000, 5000),
                'heating_costs' => $faker->numberBetween(20, 100),
                'rent_per_m' => $faker->numberBetween(10, 200),
                'advert_id' => $faker->unique()->numberBetween(1, 250),
            ]);
        }
        for($i=1; $i<=250; $i++){
            DB::table('costs')->insert([
                'price' => $faker->numberBetween(50000, 600000),
                'heating_costs' => $faker->numberBetween(20, 100),
                'rent_per_m' => $faker->numberBetween(1000, 40000),
                'advert_id' => $faker->unique()->numberBetween(251, 500),
            ]);
        }

    }
}
