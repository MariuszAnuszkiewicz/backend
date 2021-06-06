<?php

namespace App\Repository\User;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class UserRepository extends ServiceEntityRepository
{
    const PER_PAGE = 6;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User\User::class);
    }

    /**
     * @return array|array[]
     */
    public function getAll(): array
    {
        $entityManager = $this->getEntityManager();
        $sql = 'SELECT u FROM App\Entity\User\User u ORDER BY u.id ASC';
        $query = $entityManager->createQuery($sql);
        return $query->getResult();
    }

    /**
     * @param integer $id
     * @return array|array[]
     */
    public function getUserById(int $id): array
    {
        $entityManager = $this->getEntityManager();
        $sql = 'SELECT u FROM App\Entity\User\User u WHERE u.id = :id';
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
        $sql = 'SELECT u FROM App\Entity\User\User u WHERE u.id IN (:id)';
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
        $sql = 'SELECT u FROM App\Entity\User\User u WHERE u.id BETWEEN ?1 AND ?2';
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
        $sql = 'SELECT u FROM App\Entity\User\User u ORDER BY u.id';
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
        $sql = 'SELECT u FROM App\Entity\User\User u ORDER BY u.id';
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
     * @param string|null $login
     * @param string|null $state
     * @return array|array[]
     */
    public function getByLoginOrStateLikePattern(string $login = null, string $state = null)
    {
        if ($login && !$state) {
            $entityManager = $this->getEntityManager();
            $sql = "SELECT u FROM App\Entity\User\User u WHERE u.login LIKE :login OR u.login LIKE :loginWildcard";
            $query = $entityManager->createQuery($sql);
            $query->setParameter('login', "$login%");
            $query->setParameter('loginWildcard', "% %$login");
            return $query->getResult();
        }
        else if (!$login && $state) {
            $entityManager = $this->getEntityManager();
            $sql = "SELECT u FROM App\Entity\User\User u WHERE u.state LIKE :state OR u.state LIKE :stateWildcard";
            $query = $entityManager->createQuery($sql);
            $query->setParameter('state', "$state%");
            $query->setParameter('stateWildcard', "% %$state");
            return $query->getResult();
        }
        else if ($login && $state) {
            $entityManager = $this->getEntityManager();
            $sql = "SELECT u FROM App\Entity\User\User u WHERE u.login LIKE :login OR u.login LIKE :loginWildcard OR u.state LIKE :state OR u.state LIKE :stateWildcard";
            $query = $entityManager->createQuery($sql);
            $query->setParameter('login', "$login%");
            $query->setParameter('loginWildcard', "% %$login");
            $query->setParameter('state', "$state%");
            $query->setParameter('stateWildcard', "% %$state");
            return $query->getResult();
        }
    }
}
