<?php

namespace App\Controller\User\Helpers;

use App\Entity\Product\Product;
use App\Entity\User\User;

trait UserTrait {

    private function addProductsForUser(array $setProduct, array $setUser)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $products = $entityManager->getRepository(Product::class)->findBy(['id' => $setProduct]);
        $users = $entityManager->getRepository(User::class)->findBy(['id' => $setUser]);
        foreach ($products as $product) {
            foreach ($users as $user) {
                $user->addProduct($product);
            }
        }
        $entityManager->persist($user);
        $entityManager->flush();
    }
}