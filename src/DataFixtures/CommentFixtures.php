<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $comment1 = new Comment();
        $comment1->setLabel("Très beaux monument je conseille fortement.");
        $comment1->setCreatedAt(new \DateTime("2019-12-02"));
        $comment1->setActivity($this->getReference("tour-effeil"));
        $comment1->setUser($this->getReference("user-admin"));
        $comment1->setScore('4');
        $manager->persist($comment1);

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
            UserFixtures::class,
        ];
    }
}
