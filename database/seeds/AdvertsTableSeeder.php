<?php

use Illuminate\Database\Seeder;

class AdvertsTableSeeder extends Seeder
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
            DB::table('adverts')->insert([
                'name' => $faker->word,
                'type' => $faker->randomElement(['sprzedaż', 'wynajem']),
                'form' => $faker->randomElement(['działka', 'mieszkanie', 'dom', 'pokój']),
                'description' => $faker->text(1000),
                'avaliable' => $faker->dateTime('now'),
                'user_id' => $faker->numberBetween(1, 50),
                'city_id' => $faker->numberBetween(1, 50),
                'created_at' => $faker->dateTime('now'),
                'updated_at' => $faker->dateTime('now'),
            ]);
        }
    }
}
