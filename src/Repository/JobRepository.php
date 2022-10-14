<?php

namespace App\Repository;

use App\Entity\Job;
use App\Entity\JobSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Job>
 *
 * @method Job|null find($id, $lockMode = null, $lockVersion = null)
 * @method Job|null findOneBy(array $criteria, array $orderBy = null)
 * @method Job[]    findAll()
 * @method Job[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Job::class);
    }

    public function add(Job $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Job $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findAllJob(JobSearch $search)
    {
        $query = $this->findAllQuery();

        if ($search->getProfession()) {
            $query = $query
                ->andWhere('a.profession = :profession')
                ->setParameter('profession', $search->getProfession());
        }

        if ($search->getContract()) {
            $query = $query
                ->andWhere('a.contract = :contract')
                ->setParameter('contract', $search->getContract());
        }

        if ($search->getCompany()) {
            $query = $query
                ->andWhere('a.company = :company')
                ->setParameter('company', $search->getCompany());
        }

        if ($search->getSalaire()) {
            $query = $query
                ->andWhere('a.value >= :salary')
                ->setParameter('salary', $search->getSalaire());
        }

        return $query->getQuery();
    }
    
    /**
     * @return Job[]
     */
    public function findFourLatest(): array
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();
    }

    public function findAllQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('a')
            ->where('a.id != 0');
    }

//    /**
//     * @return Job[] Returns an array of Job objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('j.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Job
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
