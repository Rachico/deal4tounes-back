<?php

use App\Offer;
use App\User;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Offer::class,6)->create();
/*
        $offer1 = Offer::create([
            'name'=>'Supersouk Soukra',
            'price'=>2000,
            'description'=>'Code promo de -20% sur des articles made in tunisia',
            'image'=>'supersouk.jpg',

        ]);

        $offer2 = Offer::create([
            'name'=>'Cinema lAgora',
            'price'=>1500,
            'description'=>'Un ticket de cinema gratuit',
            'image'=>'lagora.jpg',
        ]);

$offer3 = Offer::create([
        'name'=>'Obladi Lac 1',
        'price'=>1800,
        'description'=>'Un plat acheté, un plat offert',
        'image'=>'obladi.jpg',
        ]);

$offer4 = Offer::create([
        'name'=>'Baguette & Baguette',
        'price'=>400,
        'description'=>'Code promo de -5% sur votre commande',
        'image'=>'baguette.png',
        ]);


*/


    }
}
