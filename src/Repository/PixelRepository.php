<?php

namespace App\Repository;

use App\Entity\Pixel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use finfo;

/**
 * @extends ServiceEntityRepository<Pixel>
 *
 * @method Pixel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pixel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pixel[]    findAll()
 * @method Pixel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PixelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pixel::class);
    }
    
       /**
    * persists a pixel object into the database
    */
   public function addPixelToDatabase($x, $y, $hexColor)
   {
        //updates the pixel if it already exists
        $pixel = $this->getEntityManager()->find('App\Entity\Pixel', array('coor_x' => $x, 'coor_y' => $y));
        if($pixel == null) $pixel = new Pixel();
        $pixel->setCoorX($x);
        $pixel->setCoorY($y);
        $pixel->setHexcolor($hexColor);
        $this->getEntityManager()->persist($pixel);
        $this->getEntityManager()->flush();
   }

   public function getAll(): array
   {
         return $this->findAll();
   }

//    /**
//     * @return Pixel[] Returns an array of Pixel objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Pixel
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
