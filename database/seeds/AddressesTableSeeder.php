<?php

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
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
            DB::table('addresses')->insert([
                'street' => $faker->streetName,
                'number' => $faker->numberBetween(1, 200),
                'zip_code' => $faker->postcode,
                'advert_id' => $faker->unique()->numberBetween(1, 500)
            ]);
        }
    }
}
