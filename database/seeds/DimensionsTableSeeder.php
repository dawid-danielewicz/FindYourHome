<?php

use Illuminate\Database\Seeder;

class DimensionsTableSeeder extends Seeder
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
            DB::table('dimensions')->insert([
                'area' => $faker->numberBetween(20, 1000),
                'garage_area' => $faker->numberBetween(25, 50),
                'garden_area' => $faker->numberBetween(20, 100),
                'balcony_area' => $faker->numberBetween(10, 50),
                'terrace_area' => $faker->numberBetween(10, 200),
                'advert_id' => $faker->unique()->numberBetween(1, 500)
            ]);
        }
    }
}
