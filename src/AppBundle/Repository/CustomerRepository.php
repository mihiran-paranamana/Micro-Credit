<?php

namespace AppBundle\Repository;

/**
 * CustomerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CustomerRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param $customerNic
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findCustomerByNic($customerNic)
    {
        return $this->createQueryBuilder('c')
            ->where('c.nic = :customerNic')
            ->setParameter('customerNic', $customerNic)
            ->getQuery()
            ->setMaxResults(1)
            ->getOneOrNullResult();
    }
}
