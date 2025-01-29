<?php

namespace App\DataFixtures;

use App\Entity\MicroPost;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $posts = [
            ["title" => "Welcome to first post", "text" => "This is the first post"],
            ["title" => "Symfony Fixtures", "text" => "Fixtures help you load test data easily"],
            ["title" => "Learning Doctrine", "text" => "Doctrine is a powerful ORM for Symfony"],
            ["title" => "PHP and Symfony", "text" => "Symfony is a great PHP framework"],
            ["title" => "Database Seeding", "text" => "Using fixtures, we can seed our database with initial data"],
            ["title" => "More Test Data", "text" => "Generating more data for testing"],
            ["title" => "Symfony Components", "text" => "Symfony components can be used in non-Symfony projects too"],
            ["title" => "Twig Templates", "text" => "Twig is the templating engine in Symfony"],
        ];

        foreach ($posts as $post) {
            $microPost = new MicroPost();
            $microPost->setTitle($post["title"]);
            $microPost->setText($post["text"]);
            $microPost->setCreated(new DateTime());
            $manager->persist($microPost);
        }

        $manager->flush();
    }
}
