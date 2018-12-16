<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Slot;
use App\Lapangan;

class SlotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::today();

        $lapangan = Lapangan::all();

        foreach ($lapangan as $l) {
            for ($i=1; $i < 3; $i++) { 
                $l->slots()->create([
                    'rent_date' => $today->addDays($i)
                ]);
            }
        }
        $this->command->info('Create 5 Data Slots');
    }
}
