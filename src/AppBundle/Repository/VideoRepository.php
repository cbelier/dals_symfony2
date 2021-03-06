<?php

namespace AppBundle\Repository;

/**
 * VideoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VideoRepository extends \Doctrine\ORM\EntityRepository
{
    // Afficher les produits selon leur catégories
    public function findVideoMoreLike($nb) {

        $results = $this->createQueryBuilder('video')
            ->orderBy('video.likeVideo', 'DESC')
            ->setMaxResults($nb)
            ->getQuery()
            ->getResult();
        return $results;
    }

    public function videoPerDanseType($nameDanse){
        $results = $this->createQueryBuilder('video')
            ->where('video.danse_id = :nameDanse')
            ->setParameters([
                'nameDanse' => $nameDanse
            ])
            ->getQuery()
            ->getResult();
        return $results;
    }

    public function findVideoWithRelations(){
        $results = $this->createQueryBuilder('video')
            ->select('video.id', 'video.titleVideo', 'video.nameVideo', 'video.likeVideo', 'saison.nameSaison', 'danse.nameDanse', 'celebrity.firstnameCelebrity')
            ->join('video.danseId', 'danse')
            ->leftJoin('video.saison', 'saison')
            ->leftJoin('video.celebrity', 'celebrity')
            ->getQuery()
            ->getResult();
        return $results;
    }

    public function findNbLike(){
        $results = $this->createQueryBuilder('video')
            ->select('SUM(video.likeVideo)')
            ->getQuery()
            ->getSingleScalarResult();
        return $results;
    }

    public function findNbVideo(){
        $results = $this->createQueryBuilder('video')
            ->select('COUNT(video)')
            ->getQuery()
            ->getSingleScalarResult();
        return $results;
    }


}
