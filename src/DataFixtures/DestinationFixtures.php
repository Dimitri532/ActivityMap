<?php

namespace App\DataFixtures;

use App\Entity\Destination;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DestinationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $destination1 = new Destination();
        $destination1->setName("Bretagne");
        $destination1->setDescription("La Bretagne, une région située à l’extrême ouest de la France, est une péninsule vallonnée qui s’avance dans l’océan Atlantique. Sa côte sauvage s’étend sur des kilomètres : on y trouve des stations balnéaires comme la ville chic de Dinard ou la ville fortifiée de Saint-Malo, construite sur la Manche. La côte de granit rose est un lieu convoité pour les teintes uniques que prennent le sable et les roches. La Bretagne dispose également d’un grand nombre de menhirs (sorte de mégalithe) datant de la préhistoire.");
        $destination1->setImage("bretagne.png");
        $manager->persist($destination1);

        $destination2 = new Destination();
        $destination2->setName("Iles de france");
        $destination2->setDescription("L'Île-de-France est une région située dans le centre-nord de la France. Elle entoure la célèbre capitale du pays, Paris, centre international de culture et de gastronomie avec ses cafés chics et ses jardins structurés. Parmi les lieux phares de la ville, vous pourrez visiter le Louvre, qui abrite la \"Mona Lisa\" de De Vinci, l'emblématique tour Eiffel et la cathédrale gothique Notre-Dame. En dehors de Paris, on trouve des forêts, d'imposants châteaux et des fermes, dont des exploitations laitières dont les produits servent à la fabrication du brie.");
        $destination2->setImage("ile-de-france.png");
        $destination2->addActivity($this->getReference("tour-effeil"));
        $destination2->addActivity($this->getReference("champs-elysées"));
        $manager->persist($destination2);

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
            ActivityFixtures::class,
        ];
    }
}
