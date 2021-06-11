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
    const PER_PAGE = 6;

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

    /**
     * @param integer $id
     * @return array|array[]
     */
    public function getProductById(int $id): array
    {
        $entityManager = $this->getEntityManager();
        $sql = 'SELECT p FROM App\Entity\Product\Product p WHERE p.id = :id';
        $query = $entityManager->createQuery($sql)->setParameter('id', $id);
        return $query->getResult();
    }

    /**
     * @param array $data
     * @return array|array[]
     */
    public function getIdsIn(array $data): array
    {
        $entityManager = $this->getEntityManager();
        $sql = 'SELECT p FROM App\Entity\Product\Product p WHERE p.id IN (:id)';
        $query = $entityManager->createQuery($sql)->setParameter('id', $data);
        return $query->getResult();
    }

    /**
     * @param array $data
     * @return array|array[]
     */
    public function getIdsBetween(array $data): array
    {
        $entityManager = $this->getEntityManager();
        $sql = 'SELECT p FROM App\Entity\Product\Product p WHERE p.id BETWEEN ?1 AND ?2';
        $query = $entityManager->createQuery($sql);
        $query->setParameter(1, $data[0]);
        $query->setParameter(2, $data[1]);
        return $query->getResult();

    }

    /**
     * @param string $data
     * @return array|array[]
     */
    public function getLimit(string $data): array
    {
        $entityManager = $this->getEntityManager();
        $sql = 'SELECT p FROM App\Entity\Product\Product p ORDER BY p.id';
        $query = $entityManager->createQuery($sql);
        $query->setMaxResults($data);
        return $query->getResult();
    }

    /**
     * @param string $offset
     * @param string $limit
     * @return array|array[]
     */
    public function getLimitWithOffset(string $offset, string $limit): array
    {
        $entityManager = $this->getEntityManager();
        $sql = 'SELECT p FROM App\Entity\Product\Product p ORDER BY p.id';
        $query = $entityManager->createQuery($sql);
        $query->setFirstResult($offset);
        $query->setMaxResults($limit);
        return $query->getResult();
    }

    /**
     * @return integer
     */
    public function countResults(): int
    {
        return count($this->getAll());
    }

    /**
     * @param int $from
     * @param int $to
     * @return array|array[]
     */
    public function getByPriceBetween(int $from, int $to): array
    {
        $entityManager = $this->getEntityManager();
        $sql = 'SELECT p FROM App\Entity\Product\Product p WHERE p.price BETWEEN ?1 AND ?2';
        $query = $entityManager->createQuery($sql);
        $query->setParameter(1, $from);
        $query->setParameter(2, $to);
        return $query->getResult();
    }
}
