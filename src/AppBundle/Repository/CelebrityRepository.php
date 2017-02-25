<?php

namespace AppBundle\Repository;

/**
 * CelebrityRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CelebrityRepository extends \Doctrine\ORM\EntityRepository
{
    public function searchbyName($data){
        $results = $this->createQueryBuilder('celebrity')
            ->select('celebrity.id', 'celebrity.firstnameCelebrity', 'celebrity.lastnameCelebrity')
            ->where('celebrity.firstnameCelebrity LIKE :data')
            ->orWhere('celebrity.lastnameCelebrity LIKE :data')
            ->setParameters([
                ':data' => "%$data%"
            ])
            ->getQuery()
            ->getResult();
        return $results;
    }

    public function searchLastInsertion($firstName, $lastName){
        $result = $this->createQueryBuilder('celebrity')
            ->select('celebrity.id', 'celebrity.firstnameCelebrity', 'celebrity.lastnameCelebrity')
            ->orderBy("celebrity.id", 'DESC')
            ->where('celebrity.firstnameCelebrity LIKE :firstName')
            ->andWhere('celebrity.lastnameCelebrity LIKE :lastName')
            ->setParameters([
                ':firstName' => "%$firstName%",
                ':lastName'=> "%$lastName%"
            ])
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
        return $result;
    }

    public function findNbStars(){
        $results = $this->createQueryBuilder('celebrity')
            ->select('COUNT(celebrity)')
            ->getQuery()
            ->getSingleScalarResult();
        return $results;
    }

}