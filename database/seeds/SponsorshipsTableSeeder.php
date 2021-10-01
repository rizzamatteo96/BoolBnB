<?php

use Illuminate\Database\Seeder;
use App\Sponsorship;

class SponsorshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sponsorships details array
        $sponsorShips = [
            [
                'type' => 'basic',
                'price' => 2.99,
                'duration' => 24,
            ],
            [
                'type' => 'standard',
                'price' => 5.99,
                'duration' => 72,
            ],
            [
                'type' => 'premium',
                'price' => 9.99,
                'duration' => 144,
            ],
        ];

        foreach($sponsorShips as $item){
            $newSponsorship = new Sponsorship();
            $newSponsorship->type = $item['type'];
            $newSponsorship->price = $item['price'];
            $newSponsorship->duration = $item['duration'];
            $newSponsorship->save();
        }
    }
}
