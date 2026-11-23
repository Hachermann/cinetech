<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        // 1. Créer 5 marques et les conserver dans un tableau
        $categories = [];
        foreach (['Science_Fiction', 'Action', 'Thriller', 'Comédie', 'Drame'] as $name) {
            $category = new Category();
            $category->setName($name);
            $manager->persist($category);
            $categories[] = $category;
        }
        $movies = [
            [
                'title'       => 'Inception',
                'synopsis'    => 'Dom Cobb vole des secrets dans les rêves de ses cibles. On lui propose une mission inverse : implanter une idée dans l\'esprit d\'un héritier, en échange d\'un retour auprès de ses enfants.',
                'duree'       => 148,
                'date_sortie' => '2010-07-21',
                'note_presse' => 4.2,
                'affiche'     => 'inception.jpg',
                'category'    => 'Science-Fiction',
            ],
            [
                'title'       => 'Le Dîner de cons',
                'synopsis'    => 'Chaque mercredi, Pierre Brochant et ses amis organisent un dîner où chacun amène un invité ridicule. Bloqué chez lui par un tour de reins, il voit sa soirée virer au cauchemar avec François Pignon.',
                'duree'       => 80,
                'date_sortie' => '1998-04-15',
                'note_presse' => 3.8,
                'affiche'     => 'le-diner-de-cons.jpg',
                'category'    => 'Comédie',
            ],
            [
                'title'       => 'Seven',
                'synopsis'    => 'À quelques jours de la retraite, l\'inspecteur Somerset fait équipe avec le jeune Mills pour traquer un tueur qui met en scène ses meurtres d\'après les sept péchés capitaux.',
                'duree'       => 127,
                'date_sortie' => '1996-01-31',
                'note_presse' => 4.1,
                'affiche'     => 'seven.jpg',
                'category'    => 'Thriller',
            ],
            [
                'title'       => 'Mad Max: Fury Road',
                'synopsis'    => 'Dans un désert post-apocalyptique, Max se retrouve embarqué avec l\'Imperator Furiosa, qui fuit le tyran Immortan Joe à bord d\'un camion-citerne avec les épouses de celui-ci.',
                'duree'       => 120,
                'date_sortie' => '2015-05-14',
                'note_presse' => 4.6,
                'affiche'     => 'mad-max-fury-road.jpg',
                'category'    => 'Action',
            ],
            [
                'title'       => 'Forrest Gump',
                'synopsis'    => 'Assis sur un banc, Forrest Gump raconte sa vie : un homme simple au grand cœur qui traverse sans le vouloir trente ans d\'histoire américaine, sans jamais cesser d\'aimer Jenny.',
                'duree'       => 142,
                'date_sortie' => '1994-10-05',
                'note_presse' => 3.9,
                'affiche'     => 'forrest-gump.jpg',
                'category'    => 'Drame',
            ],
            [
                'title'       => 'Parasite',
                'synopsis'    => 'Toute la famille de Ki-taek est au chômage. Quand le fils décroche des cours particuliers chez les riches Park, les quatre membres du clan s\'infiltrent un à un dans la maison.',
                'duree'       => 132,
                'date_sortie' => '2019-06-05',
                'note_presse' => 4.7,
                'affiche'     => 'parasite.jpg',
                'category'    => 'Thriller',
            ],
            [
                'title'       => 'John Wick',
                'synopsis'    => 'Tueur à gages retiré des affaires, John Wick reprend les armes quand le fils d\'un parrain de la mafia russe lui vole sa voiture et tue le chien que lui avait offert sa défunte femme.',
                'duree'       => 101,
                'date_sortie' => '2014-10-29',
                'note_presse' => 3.2,
                'affiche'     => 'john-wick.jpg',
                'category'    => 'Action',
            ],
            [
                'title'       => 'Interstellar',
                'synopsis'    => 'Alors que la Terre se meurt, un ancien pilote de la NASA part avec une équipe d\'explorateurs à travers un trou de ver, à la recherche d\'une planète habitable pour l\'humanité.',
                'duree'       => 169,
                'date_sortie' => '2014-11-05',
                'note_presse' => 4.0,
                'affiche'     => 'interstellar.jpg',
                'category'    => 'Science-Fiction',
            ],
            [
                'title'       => 'Intouchables',
                'synopsis'    => 'Philippe, riche aristocrate devenu tétraplégique, engage comme aide à domicile Driss, un jeune de banlieue tout juste sorti de prison. Une amitié improbable naît entre les deux hommes.',
                'duree'       => 112,
                'date_sortie' => '2011-11-02',
                'note_presse' => 3.6,
                'affiche'     => 'intouchables.jpg',
                'category'    => 'Comédie',
            ],
            [
                'title'       => 'Le Parrain',
                'synopsis'    => 'En 1945, Don Vito Corleone dirige l\'une des familles les plus puissantes de la mafia new-yorkaise. Michael, son fils cadet, qui voulait rester à l\'écart, se retrouve peu à peu au cœur des affaires.',
                'duree'       => 175,
                'date_sortie' => '1972-10-18',
                'note_presse' => 4.7,
                'affiche'     => 'le-parrain.jpg',
                'category'    => 'Drame',
            ],
            [
                'title'       => 'Gladiator',
                'synopsis'    => 'Trahi par Commode, le nouvel empereur, le général romain Maximus perd sa famille et est réduit en esclavage. Devenu gladiateur, il gravit les arènes jusqu\'à Rome pour se venger.',
                'duree'       => 155,
                'date_sortie' => '2000-06-20',
                'note_presse' => 3.6,
                'affiche'     => 'gladiator.jpg',
                'category'    => 'Action',
            ],
            [
                'title'       => 'Shutter Island',
                'synopsis'    => 'En 1954, le marshal Teddy Daniels enquête sur la disparition d\'une patiente dans un hôpital psychiatrique isolé sur une île. Plus il avance, plus il doute de ce qu\'il voit.',
                'duree'       => 138,
                'date_sortie' => '2010-02-24',
                'note_presse' => 3.9,
                'affiche'     => 'shutter-island.jpg',
                'category'    => 'Thriller',
            ],
            [
                'title'       => 'Matrix',
                'synopsis'    => 'Le hacker Neo découvre que le monde dans lequel il vit est une simulation créée par des machines. Recruté par Morpheus et Trinity, il rejoint la résistance.',
                'duree'       => 136,
                'date_sortie' => '1999-06-23',
                'note_presse' => 3.8,
                'affiche'     => 'matrix.jpg',
                'category'    => 'Science-Fiction',
            ],
            [
                'title'       => 'Whiplash',
                'synopsis'    => 'Andrew, jeune batteur de jazz, intègre l\'orchestre du conservatoire dirigé par Terence Fletcher, un professeur tyrannique prêt à tout pour pousser ses élèves au-delà de leurs limites.',
                'duree'       => 107,
                'date_sortie' => '2014-12-24',
                'note_presse' => 4.4,
                'affiche'     => 'whiplash.jpg',
                'category'    => 'Drame',
            ],
            [
                'title'       => 'OSS 117 : Le Caire, nid d\'espions',
                'synopsis'    => 'En 1955, l\'agent secret Hubert Bonisseur de La Bath est envoyé au Caire pour enquêter sur la disparition de son ami. Sûr de lui et maladroit, il enchaîne les gaffes diplomatiques.',
                'duree'       => 99,
                'date_sortie' => '2006-04-19',
                'note_presse' => 3.7,
                'affiche'     => 'oss-117-le-caire.jpg',
                'category'    => 'Comédie',
            ],
            [
                'title'       => 'The Dark Knight',
                'synopsis'    => 'Batman, le lieutenant Gordon et le procureur Harvey Dent s\'allient pour démanteler la pègre de Gotham. Mais un criminel imprévisible, le Joker, plonge la ville dans le chaos.',
                'duree'       => 152,
                'date_sortie' => '2008-08-13',
                'note_presse' => 4.3,
                'affiche'     => 'the-dark-knight.jpg',
                'category'    => 'Action',
            ],
            [
                'title'       => 'Gone Girl',
                'synopsis'    => 'Le jour de leur cinquième anniversaire de mariage, Amy disparaît. Les soupçons se tournent vite vers son mari Nick, dont l\'attitude intrigue la police et les médias.',
                'duree'       => 149,
                'date_sortie' => '2014-10-08',
                'note_presse' => 4.1,
                'affiche'     => 'gone-girl.jpg',
                'category'    => 'Thriller',
            ],
            [
                'title'       => 'Ex Machina',
                'synopsis'    => 'Caleb, jeune programmeur, est invité par son patron dans une villa isolée pour évaluer Ava, un robot doté d\'une intelligence artificielle. Le test tourne vite au jeu de manipulation.',
                'duree'       => 108,
                'date_sortie' => '2015-06-03',
                'note_presse' => 3.7,
                'affiche'     => 'ex-machina.jpg',
                'category'    => 'Science-Fiction',
            ],
            [
                'title'       => 'Les Évadés',
                'synopsis'    => 'Condamné à perpétuité pour le meurtre de sa femme, qu\'il dit ne pas avoir commis, le banquier Andy Dufresne survit des années dans la prison de Shawshank grâce à son amitié avec Red.',
                'duree'       => 142,
                'date_sortie' => '1995-03-01',
                'note_presse' => 3.5,
                'affiche'     => 'les-evades.jpg',
                'category'    => 'Drame',
            ],
            [
                'title'       => 'Top Gun: Maverick',
                'synopsis'    => 'Plus de trente ans après ses débuts, le pilote Pete « Maverick » Mitchell revient à Top Gun pour former une nouvelle génération de pilotes à une mission presque impossible.',
                'duree'       => 131,
                'date_sortie' => '2022-05-25',
                'note_presse' => 4.0,
                'affiche'     => 'top-gun-maverick.jpg',
                'category'    => 'Action',
            ],
            [
                'title'       => 'Le Silence des agneaux',
                'synopsis'    => 'Pour arrêter un tueur en série, la jeune recrue du FBI Clarice Starling sollicite l\'aide d\'Hannibal Lecter, psychiatre brillant et cannibale enfermé dans un asile.',
                'duree'       => 118,
                'date_sortie' => '1991-04-10',
                'note_presse' => 4.2,
                'affiche'     => 'le-silence-des-agneaux.jpg',
                'category'    => 'Thriller',
            ],
            [
                'title'       => 'The Grand Budapest Hotel',
                'synopsis'    => 'Dans l\'Europe des années 1930, le concierge d\'un grand hôtel et son jeune groom se retrouvent mêlés au vol d\'un tableau de la Renaissance et à une bataille d\'héritage.',
                'duree'       => 99,
                'date_sortie' => '2014-02-26',
                'note_presse' => 4.5,
                'affiche'     => 'the-grand-budapest-hotel.jpg',
                'category'    => 'Comédie',
            ],
            [
                'title'       => 'Blade Runner 2049',
                'synopsis'    => 'En 2049, l\'officier K, un blade runner, découvre un secret enfoui qui pourrait bouleverser la société. Son enquête le mène sur les traces de Rick Deckard, disparu depuis trente ans.',
                'duree'       => 164,
                'date_sortie' => '2017-10-04',
                'note_presse' => 4.2,
                'affiche'     => 'blade-runner-2049.jpg',
                'category'    => 'Science-Fiction',
            ],
            [
                'title'       => 'Piège de cristal',
                'synopsis'    => 'Venu passer Noël à Los Angeles, le policier John McClane se retrouve seul face à un groupe de terroristes qui a pris en otage les employés d\'une tour, dont sa femme.',
                'duree'       => 132,
                'date_sortie' => '1988-09-21',
                'note_presse' => 3.9,
                'affiche'     => 'piege-de-cristal.jpg',
                'category'    => 'Action',
            ],
            [
                'title'       => 'La Liste de Schindler',
                'synopsis'    => 'Pendant la Seconde Guerre mondiale, l\'industriel allemand Oskar Schindler emploie des travailleurs juifs dans son usine. Peu à peu, il met sa fortune en jeu pour les sauver.',
                'duree'       => 195,
                'date_sortie' => '1994-03-02',
                'note_presse' => 4.5,
                'affiche'     => 'la-liste-de-schindler.jpg',
                'category'    => 'Drame',
            ],
            [
                'title'       => 'Prisoners',
                'synopsis'    => 'Quand sa fille et son amie disparaissent le jour de Thanksgiving, Keller Dover, persuadé que la police fait fausse route, décide de mener sa propre enquête, quitte à franchir la ligne.',
                'duree'       => 153,
                'date_sortie' => '2013-10-09',
                'note_presse' => 3.9,
                'affiche'     => 'prisoners.jpg',
                'category'    => 'Thriller',
            ],
            [
                'title'       => 'Bienvenue chez les Ch\'tis',
                'synopsis'    => 'Muté par sanction dans le Nord, Philippe Abrams, directeur de poste à Salon-de-Provence, part à reculons pour Bergues. Il y découvre une région et des habitants bien loin de ses préjugés.',
                'duree'       => 106,
                'date_sortie' => '2008-02-27',
                'note_presse' => 3.1,
                'affiche'     => 'bienvenue-chez-les-chtis.jpg',
                'category'    => 'Comédie',
            ],
            [
                'title'       => 'Seul sur Mars',
                'synopsis'    => 'Laissé pour mort par son équipage après une tempête, l\'astronaute Mark Watney se retrouve seul sur Mars. Botaniste, il doit trouver comment survivre en attendant un secours.',
                'duree'       => 144,
                'date_sortie' => '2015-10-21',
                'note_presse' => 3.9,
                'affiche'     => 'seul-sur-mars.jpg',
                'category'    => 'Science-Fiction',
            ],
            [
                'title'       => 'Mission: Impossible – Fallout',
                'synopsis'    => 'Après l\'échec d\'une mission, Ethan Hunt et son équipe doivent récupérer trois cœurs de plutonium avant qu\'ils ne tombent entre les mains d\'un groupe terroriste.',
                'duree'       => 147,
                'date_sortie' => '2018-08-01',
                'note_presse' => 4.0,
                'affiche'     => 'mission-impossible-fallout.jpg',
                'category'    => 'Action',
            ],
            [
                'title'       => 'Moonlight',
                'synopsis'    => 'À Miami, la vie de Chiron en trois chapitres, de l\'enfance à l\'âge adulte : un garçon discret qui grandit entre une mère toxicomane, la violence du quartier et la recherche de lui-même.',
                'duree'       => 111,
                'date_sortie' => '2017-02-01',
                'note_presse' => 4.4,
                'affiche'     => 'moonlight.jpg',
                'category'    => 'Drame',
            ],
        ];
        $cats = [];
        foreach ($categories as $category) {
            $name = str_replace('_', '-', $category->getName());
            $cats[$name] = $category;
        }

        foreach ($movies as $data) {
            $movie = (new Movie())
                ->setTitle($data['title'])
                ->setSynopsis($data['synopsis'])
                ->setDuree($data['duree'])
                ->setDateSortie(new \DateTime($data['date_sortie']))
                ->setNotePresse($data['note_presse'])
                ->setAffiche($data['affiche'])
                ->setCategory($cats[$data['category']]);
            $manager->persist($movie);
        }


        $manager->flush();
    }
}
