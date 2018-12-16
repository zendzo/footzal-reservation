<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Lapangan;

class LapangansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $lapangan = ['Lapangan Futsal Pamedan','Lapangan  Futsal Bintan Center','Lapangan Futsal Kijang'];

        for ($i=0; $i < 3; $i++) { 
            Lapangan::create([
                'name' => $lapangan[$i],
                'address' => $faker->address,
                'description' => $faker->sentence,
                'slug' => str_slug($lapangan[$i])
            ]);
        }

        $this->command->info('Create 10 Data Lapangan');
    }
}
