<?php

namespace App\DataFixtures;

use App\Entity\Order;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class OrderFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

       
        for($ord = 1; $ord <= 5; $ord++){
            $order = new Order();
            $order->setPrice('60');
            //$order->setStock($faker->numberBetween($min = 5, $max = 8));
            $order->setPricejeune('48');
            $order->setPricekid('38');
            
            $manager->persist($order);
        }
        $manager->flush();
    }
}
