<?php

use App\Action;
use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $action1 = Action::create([
            'title'=>'Recyclage de vetements en jean.',
            'body'=>'Avez-vous des vetements en jean dont vous n\'avez plus besoin ? Emmenez les à cette adresse! ',
            'lat'=>'36.835240', //password
            'lng'=> '10.234440',
        ]);

        $action2 = Action::create([
            'title'=>'Don de sang.',
            'body'=>'Combattons ensemble toutes les menaces qui planent sur le malade en l\'absence de sang en temps opportun',
            'lat'=>'36.778150', //password
            'lng'=> '10.111460',
        ]);

        $action3 = Action::create([
            'title'=>'Recyclage de bouteilles',
            'body'=>'Emmenez vos bouteilles en plastique et aidez des jeunes artisans à créer des meubles.',
            'lat'=>'36.883270', //password
            'lng'=> '10.324450',
        ]);
    }
}
