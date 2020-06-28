<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(CitiesTableSeeder::class);
         $this->call(AdvertsTableSeeder::class);
         $this->call(AddressesTableSeeder::class);
         $this->call(ConditionsTableSeeder::class);
         $this->call(CostsTableSeeder::class);
         $this->call(DimensionsTableSeeder::class);
         $this->call(FixturesTableSeeder::class);
         $this->call(HeatingTableSeeder::class);
         $this->call(MessagesTableSeeder::class);
         $this->call(PhotosTableSeeder::class);
         $this->call(RoomsTableSeeder::class);
    }
}
