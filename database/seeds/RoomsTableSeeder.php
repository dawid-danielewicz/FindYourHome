<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
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
            DB::table('rooms')->insert([
                'rooms' => $faker->numberBetween(1, 5),
                'bathrooms' => $faker->numberBetween(1, 2),
                'balcony' => $faker->boolean(50),
                'terrace' => $faker->boolean(50),
                'advert_id' => $faker->unique()->numberBetween(1, 500),
            ]);
        }
    }
}
