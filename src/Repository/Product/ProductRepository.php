<?php

namespace App\Repository\Product;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Exception;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product\Product::class);
    }

    /**
     * @return array|array[]
     */
    public function getAll(): array
    {
        $entityManager = $this->getEntityManager();
        $sql = 'SELECT p FROM App\Entity\Product\Product p ORDER BY p.id ASC';
        $query = $entityManager->createQuery($sql);
        return $query->getResult();
    }

}
