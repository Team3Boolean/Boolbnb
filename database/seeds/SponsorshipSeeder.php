<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Sponsorship;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // creato array bidimensionale per popolare ogni riga delle sponsorizzazioni
        $types = [
            0 => [
                'name' => 'bronze',
                'price' => 2.99,
                'duration' => 24,
            ],
            1 => [
                'name' => 'silver',
                'price' => 5.99,
                'duration' => 72,
            ],
            2 => [
                'name' => 'gold',
                'price' => 9.99,
                'duration' => 144,
            ],
        ];

        Schema::disableForeignKeyConstraints();
        Sponsorship::truncate();

        //ciclo per inserire in ogni riga un sponsorizzazione con relativa durata e relativo prezzo
        foreach ($types as $type) {
            
            $newSponsorship = new Sponsorship();
            
            $newSponsorship->name = $type['name'];
            $newSponsorship->price = $type['price'];
            $newSponsorship->duration = $type['duration'];

            $newSponsorship->save();

        }
    }
}
