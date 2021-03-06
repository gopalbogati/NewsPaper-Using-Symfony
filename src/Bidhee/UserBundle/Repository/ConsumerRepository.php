<?php

namespace Bidhee\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Bidhee\UserBundle\Entity\Consumer;

/**
 * ConsumerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ConsumerRepository extends EntityRepository
{
    public function getConsumerListQuery($filters)
    {
        $qb = $this->_em->createQueryBuilder();

        $qb->select('c')
            ->from(Consumer::class, 'c')
            ->where('1=1');

        if (array_key_exists('name', $filters) and $filters['name'] != '') {
            $qb->andWhere('c.name LIKE :name')->setParameter('name', '%' . $filters['name'] . '%');
        }

        if (array_key_exists('username', $filters) and $filters['username'] != '') {
            $qb->andWhere('c.username LIKE :username')->setParameter('username', '%' . $filters['username'] . '%');
        }

        if (array_key_exists('email', $filters) and $filters['email'] != '') {
            $qb->andWhere('c.email LIKE :email')->setParameter('email', '%' . $filters['email'] . '%');
        }

        $qb->orderBy('c.createdOn', 'DESC');

        return $qb->getQuery();
    }
}
