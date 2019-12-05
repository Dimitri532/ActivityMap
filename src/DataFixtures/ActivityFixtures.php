<?php

namespace App\DataFixtures;

use App\Entity\Activity;
use App\Service\Slugger;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ActivityFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugger;

    /**
     * EventFixtures constructor.
     * @param $slugger
     */
    public function __construct(Slugger $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager)
    {
        $activity1 = new Activity();
        $activity1->setName("Tour Effeil");
        $activity1->setSlug($this->slugger->slugify($activity1->getName()));
        $activity1->setDescription("La tour Eiffel est une tour de fer puddlée de 324 mètres de hauteur située à Paris, à l’extrémité nord-ouest du parc du Champ-de-Mars en bordure de la Seine dans le 7ᵉ arrondissement. Son adresse officielle est 5, avenue Anatole-France.");
        $activity1->setImage("tour-effeil.png");
        $activity1->setLat("2.294481");
        $activity1->setLng("48.858370");
        $activity1->setCity("Paris");
        $activity1->setZipcode("75007");
        $activity1->setIsValid(true);
        $activity1->setIsCertified(false);
        $activity1->setUser($this->getReference("user-admin"));
        $this->setReference("tour-effeil", $activity1);
        $manager->persist($activity1);

        $activity2 = new Activity();
        $activity2->setName("Champs Elysées");
        $activity2->setSlug($this->slugger->slugify($activity2->getName()));
        $activity2->setDescription("L’avenue des Champs-Élysées est une voie de Paris. Longue de près de deux kilomètres et suivant l'axe historique de la ville, elle est une voie de circulation centrale reliant la place de la Concorde à la place Charles-de-Gaulle dans le 8ᵉ arrondissement.");
        $activity2->setImage("champs-elysées.png");
        $activity2->setLat("2.307946");
        $activity2->setLng("48.869745");
        $activity2->setCity("Paris");
        $activity2->setZipcode("75008");
        $activity2->setIsValid(true);
        $activity2->setIsCertified(false);
        $activity2->setUser($this->getReference("user-admin"));
        $this->setReference("champs-elysées", $activity2);
        $manager->persist($activity2);
        

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
