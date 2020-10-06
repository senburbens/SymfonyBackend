<?php

namespace App\Repository;

use App\Entity\SiteConsultation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SiteConsultation|null find($id, $lockMode = null, $lockVersion = null)
 * @method SiteConsultation|null findOneBy(array $criteria, array $orderBy = null)
 * @method SiteConsultation[]    findAll()
 * @method SiteConsultation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SiteConsultationRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SiteConsultation::class);
    }

    // /**
    //  * @return SiteConsultation[] Returns an array of SiteConsultation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SiteConsultation
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findOneByCode($value): ?SiteConsultation
    {
        $results =  $this->createQueryBuilder('sc')
        ->andWhere('sc.code = :val')
        ->setParameter('val', $value)
        ->getQuery()
        ->getOneOrNullResult();

        return $results;
    }    

    public function testQuery($code) : ?SiteConsultation
    {
        $sql = "SELECT sc FROM App:SiteConsultation sc WHERE sc.code = :code";
        $results = $this->getEntityManager()
                        ->createQuery($sql)
                        ->setParameter('code', $code)
                        ->getResult();
        return $results;
    }


    public function testQuery2()
    {
        $result = $this->findBy(
                            array(),    // $where 
                            array(),    // $orderBy
                            41,         // $limit
                            0           // $offset
                        );
        return $result;
    }

    public function testQuery3(){
        return $this->getEntityManager()->createQuery('SELECT u FROM App:SiteConsultation u')
        ->getResult();
    }
}
