<?php

use App\Article;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Article::class,3)->create();
        /*
        $article1 = Article::create([
            'title'=>'Baya',
            'Typography'=>'Le programme de l’entrepreneuriat féminin RAIDA :Ce programme RAIDA,lancé en 2016, a contribué à la Création de plus de 4400 projets, destiné aux femmes qui désirent créer des petits ou moyens projets.',
            'TypographyParagraph'=>'Depuis son lancementen octobre 2016,le Programme de promotion de l’entrepreneuriat féminin “RAIDA” a contribué à la création ',
            'content_image'=>'femmes_1593381104.png',
            'moreIcon'=>'https://www.businessnews.com.tn/injah-men-darek--la-plateforme-en-ligne-gratuite-de-revision-par-excellence-pour-le-bac-lancee-par-luniversite-centrale,524,99663,3',
            'avatar'=>'baya_1593381104.png',
            'User_id'=>'ec4f4c90-bf12-11ea-8f04-dbc2ff1b82cf',
        ]);

        $article2 = Article::create([
            'title'=>'Business News',
            'Typography'=>'L’Université Centrale premier réseau panafricain d’enseignement privé offre cette fois-ci aux bacheliers qui sont en pleine période de révision, une plateforme en ligne gratuite spécialement dédiée à la préparation du baccalauréat.',
            'TypographyParagraph'=>'Après avoir accompagné tout au long de la période de confinement et de crise sanitaire du au Covid-19 ses étudiants nationaux et internationaux qui n’ont pu rejoindre leurs pays.L’Université Centrale membre du groupe Honoris',
            'moreIcon'=>'https://www.businessnews.com.tn/injah-men-darek--la-plateforme-en-ligne-gratuite-de-revision-par-excellence-pour-le-bac-lancee-par-luniversite-centrale,524,99663,3',
            'content_image'=>'injah_1593388269.png',
            'avatar'=>'busi_1593388269.png',

            'User_id'=>'ec4f4c90-bf12-11ea-8f04-dbc2ff1b82cf',
        ]);

        $article3 = Article::create([
            'title'=>'Entreprises',
            'Typography'=>'Le Programme Tounes Wijhetouna ambitionne de diversifier loffre touristique tunisienne en créant des synergies entre les secteurs',
            'TypographyParagraph'=>'La mise en oeuvre de ce programme de 51 millions d’Euros – pour une contribution de l’UE de 45 millions d’Euros – et d’une durée de 6 ans s’articule autour de trois grands axes thématiques.Une centrale d’expertise dédiée appuiera le',
            'moreIcon'=>'https://www.entreprises-magazine.com/tounes-wijhetouna-lunion-europeenne-sengage-pour-le-tourisme-durable-en-tunisie/',
            'content_image'=>'entreprise_1593386013.png',
            'avatar'=>'Tounes-Wijhetouna_1593386013.png',

            'User_id'=>'ec4f4c90-bf12-11ea-8f04-dbc2ff1b82cf',
        ]);

        $article4 = Article::create([
            'title'=>'femmes de Tunisie',
            'Typography'=>'En cette période de crise, plusieurs familles dans le besoin se sont retrouvées dans une situation financière embarrassante due au confinement. Les Tunisiens ont fait preuve de solidarité pour aider les nécessiteux.',
            'TypographyParagraph'=>'"Toutefois, nos amis ivoiriens vivant en Tunisie se sont vite retrouvé sans source de revenu à cause de la fermeture des restaurants et cafés et des chantiers de construction. Certaines communes et associations ont par ailleurs lancé un appel pour les soutenir financièrement. En effet, la commune de la Marsa a été la première à penser à nos frères ivoiriens en faisant appel à la solidarité des Marsois.Des collectes ont également',
            'moreIcon'=>'https://femmesdetunisie.com/solidarite-les-tunisiens-appeles-a-venir-en-aide-a-la-communaute-ivoirienne-en-tunisie/',
            'content_image'=>'femme_1593384660.png',
            'avatar'=>'solidarite_1593384660.png',

            'User_id'=>'ec4f4c90-bf12-11ea-8f04-dbc2ff1b82cf',
        ]);
        */


    }
}
