<?php

use Illuminate\Database\Seeder;

class ConditionsTableSeeder extends Seeder
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
            DB::table('conditions')->insert([
                'build_year' => $faker->year('now'),
                'fixed' => $faker->year('now'),
                'advert_id' => $faker->unique()->numberBetween(1, 500),
            ]);
        }
    }
}
