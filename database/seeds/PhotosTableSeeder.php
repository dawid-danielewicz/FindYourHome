<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('pl_PL');

        for($i=1; $i<=600; $i++){
            DB::table('photos')->insert([
                'path' => $faker->imageUrl(1000,600, 'city'),
                'photoable_type' => 'App\Advert',
                'photoable_id' => $faker->numberBetween(1, 500)
            ]);
        }

        for($i=1; $i<=50; $i++){
            DB::table('photos')->insert([
                'path' => $faker->imageUrl(200,250, 'people'),
                'photoable_type' => 'App\User',
                'photoable_id' => $faker->unique()->numberBetween(1, 50)
            ]);
        }
    }
}
