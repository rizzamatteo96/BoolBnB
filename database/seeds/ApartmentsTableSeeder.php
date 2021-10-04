<?php

use Illuminate\Database\Seeder;
use App\Apartment;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for( $i=0 ; $i<5 ; $i++){
            $newApartment = new Apartment();

            $newApartment->title = 'appartamento' . ' - ' . ($i + 1);
            $newApartment->description = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi ullam atque esse tempore itaque consequatur nam maxime at! Earum iusto ducimus totam impedit doloribus! Mollitia?';
            $newApartment->n_rooms = rand(2, 10);
            $newApartment->n_beds = rand(1, 6);
            $newApartment->n_bathrooms = rand(1, 4);
            $newApartment->n_square_meters = rand(30, 150);
            $newApartment->daily_price = rand(40, 500);
            $newApartment->img = 'https://picsum.photos/id/237/200/300';
            $newApartment->city = 'Modena';
            $newApartment->address = 'Via Milano';
            $newApartment->house_num = rand(1, 25);
            $newApartment->postal_code = rand(10000, 99999);
        };
    }
}
