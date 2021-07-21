<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Apartment;
use App\User;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Apartment::truncate();

        for ($i = 0; $i < 15; $i++){
            $newApartment = new Apartment();

            $newApartment->user_id = $faker->numberBetween(1, 10);
            $newApartment->title = $faker->word();
            $newApartment->description = $faker->text(800);
            $newApartment->rooms = $faker->numberBetween(1, 20);
            $newApartment->beds = $faker->numberBetween(1, 10);
            $newApartment->bathrooms = $faker->numberBetween(1, 10);
            $newApartment->mq = $faker->numberBetween(50, 800);
            $newApartment->address = $faker->streetAddress();
            $newApartment->gps_lng = $faker->longitude(10, 15);
            $newApartment->gps_lat = $faker->latitude(36, 46);
            $newApartment->img_cover  = $faker->imageUrl(640, 480, 'city', true);
            $newApartment->searchable = $faker->boolean();
            $newApartment->price = $faker->numberBetween(25, 300);

            $newApartment->save();
        }
    }

}