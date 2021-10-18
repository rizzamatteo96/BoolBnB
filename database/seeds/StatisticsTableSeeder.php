<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use App\Statistic;

class StatisticsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Apartment::all() as $apartment){

            $randNum = rand(200, 1000);
            for ($i = 0; $i < $randNum; $i++) { 

                // create new stat
                $newStat = new Statistic();


                // set apartment id
                $newStat->apartment_id = $apartment->id;


                // create random date
                //day
                //Start point of our date range.
                $startDay = strtotime("14 April 2021");

                //End point of our date range.
                $endDay = strtotime("22 October 2021");

                //Custom range.
                $timestamp = mt_rand($startDay, $endDay);

                //Print it out.
                $newStat->clicked_at = date("Y-m-d", $timestamp);


                // set visitor
                $newStat->visitor = mt_rand(0, 254) . "." . mt_rand(0, 254) . "." . mt_rand(0, 254) . "." . mt_rand(0, 254);


                // Save new statistic
                $newStat->save();

            }

        }
    }
}
