<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Room;
use App\Entity\Region;

class AppFixtures extends Fixture
{
    // On définit l'id de référence pour une instance de région
    public const IDF_REGION_REFERENCE = 'idf-region';
    public const CORSE_REGION_REFERENCE = 'corse-region';

    public function load(ObjectManager $manager)
    {
        //On définit 2 nouvelle région pour donnée de test:
        $region = new Region();
        $region->setCountry("FR");
        $region->setName("Ile de France");
        $region->setPresentation("La région française capitale");
        $manager->persist($region);
        $region2 = new Region();
        $region2->setCountry("FR");
        $region2->setName("Corse");
        $region2->setPresentation("Là où ça fait boum");
        $manager->persist($region2);

        $manager->flush();
        // Une fois l'instance de Region sauvée en base de données,
        // elle dispose d'un identifiant généré par Doctrine, et peut
        // donc être sauvegardée comme future référence.
        $this->addReference(self::IDF_REGION_REFERENCE, $region);
        $this->addReference(self::CORSE_REGION_REFERENCE, $region2);

        $room = new Room();
        $room->setSummary("Beau poulailler ancien à Évry");
        $room->setDescription("très joli espace sur paille");
        // On peut plutôt faire une référence explicite à la référence
        // enregistrée précédamment, ce qui permet d'éviter de se
        // tromper d'instance de Region :
        $room->addRegion($this->getReference(self::IDF_REGION_REFERENCE));     
        $manager->persist($room);
    
        $manager->flush();
    }
}
