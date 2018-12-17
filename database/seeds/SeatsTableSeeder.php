<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Slot;
use App\Seat;

class SeatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slots = Slot::all();

        foreach ($slots as $key => $slot) {
            for ($i=10; $i < 22; $i++) { 
                Seat::create([
                    'slot_id' => $slot->id,
                    'rent_time' => Carbon::createFromTime($i,0,0,'Asia/Jakarta'),
                    'booked' => rand(0,1)
                ]);
            }
        }

        $this->command->info('Create  Seat Fake Data!');
    }
}
