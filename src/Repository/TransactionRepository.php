<?php

namespace App\Repository;

use App\Entity\Transaction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Transaction|null find($id, $lockMode = null, $lockVersion = null)
 * @method Transaction|null findOneBy(array $criteria, array $orderBy = null)
 * @method Transaction[]    findAll()
 * @method Transaction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Transaction::class);
    }

    /**
     * @return Transaction[] Returns an array of Transaction objects
     */
     public function findByParttenaireDate($value, $date)
    {
        return $this->createQueryBuilder('t')
            ->where('t.compteDeDepot = :val')
            ->orWhere('t.compteDeRetrait = :val') 
            ->andWhere('t.createdAt = :date') 
            ->setParameter('val', $value)
            ->setParameter('date', $date)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
        
        //from('transaction' , 't')
        // ->where('t.id = :val')
        // ->setParameters(array(1=>'val1', 2=>'val2))
        // ->getArrayResult()
        // ->getSingleResult()
        
    }
    

    /*
    public function findOneBySomeField($value): ?Transaction
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    
}
