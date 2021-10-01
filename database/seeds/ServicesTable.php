<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Service;

class SponsorshipTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Services array
        $services = [
            'Cucina',
            'Aria condizionata',
            'Asciugatrice',
            'Colazione',
            'Ferro da stiro',
            'Spazio di lavoro dedicato',
            'Culla',
            'Riscaldamento',
            'Lavatrice',
            'Wi-fi',
            'Camino',
            'Asciugacapelli',
            'TV',
            'Seggiolone'
        ];

        // Save array data in DB
        foreach($services as $item){
            // Create new istances
            $newService = new Service();

            // Create service slug
            $newServiceSlug = Str::slug($item, '-');

            // copy slug base in slug variable to check if already exist
            $checkNewSlug = $newServiceSlug;

            // prepare the counter
            $counter = 0;

            // check if slug already exist and add counter in case of double presence
            while(Service::where('slug', $checkNewSlug)->first()){
                $counter++;
                $checkNewSlug = $newServiceSlug . '-' . $counter;
            }

            // save edited slug in main variable before send it to DB
            $newServiceSlug = $checkNewSlug;
            $newService->name = $item;
            $newService->slug = $newServiceSlug;
            $newService->save();
        }
    }
}