<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //array per i servizi disponibili che un host puo aggiungere alla sua casa
        $services = [
            'piscina',
            'sauna',
            'idromassaggio',
            'parcheggio coperto',
            'condizionatore',
            'giardino privato',
            'noleggio biciclette'
        ];

        Schema::disableForeignKeyConstraints();
        Service::truncate();

        //ciclo per inserire in ogni riga un servizio che puo essere aggiunto alla casa
        foreach ($services as $service) {
            $newService = new Service();

            $newService->name = $service;

            $newService->save();
        }
    }
}
