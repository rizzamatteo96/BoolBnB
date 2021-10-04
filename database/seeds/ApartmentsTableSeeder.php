<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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

            // imposto lo slug dal titolo verificando che non sia già presente nella tabella essendo questo univoco
            $baseSlug = Str::slug($newApartment->title, '-');

            $newSlug = $baseSlug;
            $counter = 0;
            while(Apartment::where('slug', $newSlug)->first()){
                $counter++;
                $newSlug = $baseSlug . '-' . $counter;
            }

            $newApartment->slug = $newSlug;

            $newApartment->description = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi ullam atque esse tempore itaque consequatur nam maxime at! Earum iusto ducimus totam impedit doloribus! Mollitia?';
            $newApartment->n_rooms = rand(2, 10);
            $newApartment->n_beds = rand(1, 6);
            $newApartment->n_bathrooms = rand(1, 4);
            $newApartment->n_square_meters = rand(30, 150);
            $newApartment->daily_price = rand(40, 500);
            $newApartment->image = 'https://picsum.photos/id/237/200/300';
            $newApartment->city = 'Modena';
            $newApartment->address = 'Via Milano';
            $newApartment->house_num = rand(1, 25);
            $newApartment->postal_code = rand(10000, 99999);
            $newApartment->latitude = 45.7737690000;
            $newApartment->longitude = 11.45460100000;

            $newApartment->user_id = 1;


            $newApartment->save();

        };
    }
}
