<?php

use Illuminate\Database\Seeder;

class FixturesTableSeeder extends Seeder
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
            DB::table('fixtures')->insert([
                'aircondition' => $faker->boolean(50),
                'cellar' => $faker->boolean(50),
                'garden' => $faker->boolean(50),
                'place' => $faker->randomElement(['miejsce parkingowe', 'garaż']),
                'floor' => $faker->numberBetween(1, 10),
                'advert_id' => $faker->unique()->numberBetween(1, 500),
            ]);
        }
    }
}
