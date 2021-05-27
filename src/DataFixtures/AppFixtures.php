<?php

namespace App\DataFixtures;

use App\Entity\Product\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            $product->setName('product ' . $i);
            $product->setInfo('some info, text' . $i);
            $product->setPublicDate(new \DateTime());
            $manager->persist($product);
        }
        $manager->flush();
    }
}