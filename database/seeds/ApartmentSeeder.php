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
        $apartments = [
            [
                'title' => 'Appartamento Tulipano',
                'slug' => '',
                'description' => 'Splendido bilocale di 65 mq sito in un moderno ed elegante edificio residenziale, circondato da un ampio spazio pubblico con rilassanti aree verdi e sviluppato intorno alla suggestiva Torre medievale Gorani, nel pieno centro di Milano.
                ',
                'rooms' => 1,
                'beds' => 2,
                'bathrooms' => 1,
                'mq' => 65,
                'address' => 'via Gorani 5, Milano',
                'img_cover' => '',
                'price' => 45,
                'searchable' => '',
                'gps_lat' => '0.0000',
                'gps_lng' => '0.0000',
            ],
            [
                'title' => 'Beauty Open space',
                'slug' => '',
                'description' => 'Open space al secondo piano, confortevole e luminoso, in una zona strategica della città, ben collegata con il centro e le principali attrazioni turistiche. La cucina è completa di accessori, piatti, stoviglie ed elettrodomestici: bollitore, frigorifero, piastre a induzione e microonde. La zona notte è composta da 1 camera da letto con 1 letto matrimoniale.
                ',
                'rooms' => 1,
                'beds' => 1,
                'bathrooms' => 1,
                'mq' => 45,
                'address' => 'via San Maurilio 20, Milano',
                'img_cover' => '',
                'price' => 55,
                'searchable' => '',
                'gps_lat' => '0.0000',
                'gps_lng' => '0.0000',
            ],
            [
                'title' => 'TRA LAGHI E MONTAGNE',
                'slug' => '',
                'description' => 'L’appartamento è stato completamente ristrutturato e isolato da rumori con controsoffitto e pareti in cartongesso con i quali sono stati creati anche dei bei giochi di luci. Si trova in un piccolo condominio di sei famiglie,in zona tranquilla e ben servita dai mezzi pubblici.
                IMPORTANTE: Al momento del check-in obbligatorio esibire un documento identificativo per ogni ospite alloggiante',
                'rooms' => 2,
                'beds' => 2,
                'bathrooms' => 1,
                'mq' => 72,
                'address' => 'via Maria Croci 10, Induno Olona VA',
                'img_cover' => '',
                'price' => 70,
                'searchable' => '',
                'gps_lat' => '0.0000',
                'gps_lng' => '0.0000',
            ],
            [
                'title' => 'Il Cortile Fiorito',
                'slug' => '',
                'description' => 'Grazioso appartamento totalmente rinnovato e completamente accessoriato, ad uso esclusivo degli ospiti e con ingresso indipendente, dotato di balcone esposto al sole durante tutto il pomeriggio.',
                'rooms' => 4,
                'beds' => 6,
                'bathrooms' => 2,
                'mq' => 115,
                'address' => 'via Robarello 2, Varese',
                'img_cover' => '',
                'price' => 98,
                'searchable' => '',
                'gps_lat' => '0.0000',
                'gps_lng' => '0.0000',
            ],
            [
                'title' => 'Casa Radiosa: 200m da stazione,università,ospedale',
                'slug' => '',
                'description' => "A pochissimi passi dalla stazione (treni e autobus) e a meno di 10 minuti a piedi sia dall'Ospedale di Varese che dall'Università. Zona servitissima con bar, alimentari e numerosi locali.
                L'appartamento di 3 stanze cucina e soggiorno è in un condominio tranquillo e l'host Miriam, sempre disponibile, vive nell'appartamento a fianco.
                E' inclusa la fornitura di un set biancheria letto ed un set bagno per ogni soggiorno.",
                'rooms' => 3,
                'beds' => 4,
                'bathrooms' => 3,
                'mq' => 100,
                'address' => 'via Piave 3, Varese',
                'img_cover' => '',
                'price' => 85,
                'searchable' => '',
                'gps_lat' => '0.0000',
                'gps_lng' => '0.0000',
            ],
            [
                'title' => 'Villa Serena',
                'slug' => '',
                'description' => "Bella villa a 2 piani per gli ospiti , nel parco nazionale di Tradate, una piccola città situata a 30 km a nord di Milano.
                Si tratta di una villa di 150 m2 con un fantastico giardino e piscina.
                A soli 30 minuti dall'aeroporto di Milano Malpensa una posizione strategica per chi desidera visitare i 3 grandi laghi del nord Italia: Lago di Como, Lago Maggiore e Lago di Lugano.",
                'rooms' => 3,
                'beds' => 5,
                'bathrooms' => 2,
                'mq' => 150,
                'address' => 'via del Pracallo 1, Tradate',
                'img_cover' => '',
                'price' => 130,
                'searchable' => '',
                'gps_lat' => '0.0000',
                'gps_lng' => '0.0000',
            ],
            [
                'title' => 'B&B Alfredo',
                'slug' => '',
                'description' => 'Tutte le camere sono arredate in modo semplice ma con gusto dotate di aria condizionata tv e internet.Ampi spazi nella zona giorno, cucina ben attrezzata e locale lavanderia con lavatrice ed asciugatrice a disposizione degli ospiti .',
                'rooms' => 3,
                'beds' => 5,
                'bathrooms' => 1,
                'mq' => 65,
                'address' => 'via Cesare Battisti, 8, Fagnano Olona, VA',
                'img_cover' => '',
                'price' => 39,
                'searchable' => '',
                'gps_lat' => '0.0000',
                'gps_lng' => '0.0000',
            ],
            [
                'title' => 'Appartamento di lusso, vicino al Pantheon',
                'slug' => '',
                'description' => 'Exclusive apartment on two levels in the heart of the historic center, composed on the first floor by a large entrance hall, lounge and dining room, fully equipped kitchen, double bedroom and bathroom, on the upper level: two independent double bedrooms and a second bathroom.
                High speed Internet, air conditioning, elevator ,furnished and finished with prestigious elements , safe and quite building',
                'rooms' => 3,
                'beds' => 6,
                'bathrooms' => 2,
                'mq' => 130,
                'address' => 'via della Maddalena, 54, Roma',
                'img_cover' => '',
                'price' => 106,
                'searchable' => '',
                'gps_lat' => '0.0000',
                'gps_lng' => '0.0000',
            ],
            [
                'title' => 'Appartamento con vista Colosseo',
                'slug' => '',
                'description' => '',
                'rooms' => 3,
                'beds' => 7,
                'bathrooms' => 2,
                'mq' => 147,
                'address' => 'via Pertini, 5, Roma',
                'img_cover' => '',
                'price' => 190,
                'searchable' => '',
                'gps_lat' => '0.0000',
                'gps_lng' => '0.0000',
            ],
            [
                'title' => 'Appartamento Rosaria',
                'slug' => '',
                'description' => "Il nostro alloggio è situato in pieno centro storico, a Rione Monti,il primo rione di Roma, il più antico,nel quale si trovano testimonianze dell'epoca romana, medioevale, rinascimentale, e barocca, una successione di stili che copre 2500 anni di storia.Ideale per chi vuole avere tutti i monumenti a poche centinaia di metri,compresa la stazione centrale Termini.Le sue stradine antiche fatte di sampietrini vi accoglieranno con ristoranti,vinerie e botteghe di artigiane di una bellezza mozzafiato",
                'rooms' => 4,
                'beds' => 6,
                'bathrooms' => 2,
                'mp' => 160,
                'address' => 'via Matteo Boiardo 11, Roma',
                'img_cover' => '',
                'price' => 184,
                'searchable' => '',
                'gps_lat' => '0.0000',
                'gps_lng' => '0.0000',
            ],
        ];


        Schema::disableForeignKeyConstraints();
        Apartment::truncate();

        foreach ($apartments as $apartment){
            $newApartment = new Apartment();

            $newApartment->user_id = 11;
            $newApartment->title = $apartment['title'];
            $newApartment->description = $apartment['description'];
            $newApartment->rooms = $apartment['rooms'];
            $newApartment->beds = $apartment['beds'];
            $newApartment->bathrooms = $apartment['bathrooms'];
            $newApartment->mq = $faker->numberBetween(25, 150);
            $newApartment->address = $apartment['address'];
            $newApartment->gps_lng = $apartment['gps_lng'];
            $newApartment->gps_lat = $apartment['gps_lat'];
            $newApartment->img_cover  = $apartment['img_cover'];
            $newApartment->searchable = $faker->boolean();
            $newApartment->price = $apartment['price'];

            $newApartment->save();
        }
    }

}