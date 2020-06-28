<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
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
            DB::table('messages')->insert([
                'name' => $faker->firstName,
                'email' => $faker->email,
                'telephone' => $faker->phoneNumber,
                'content' => $faker->text(200),
                'user_id' => $faker->numberBetween(1, 50),
                'created_at' => $faker->dateTime('now'),
                'updated_at' => $faker->dateTime('now')
            ]);
        }
    }
}
