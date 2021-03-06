<?php

namespace AppBundle\Repository;

/**
 * InstallmentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class InstallmentRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param $loan
     * @return array
     */
    public function findLastInstallmentsByLoan($loan)
    {
        return $this->createQueryBuilder('i')
            ->where('i.loan = :loanId')
            ->andWhere('i.paymentDate >= :lastPrintedDate')
            ->setParameter('loanId', $loan->getId())
            ->setParameter('lastPrintedDate', $loan->getArea()->getLastPrintedDate())
            ->getQuery()
            ->getResult();
    }
}
