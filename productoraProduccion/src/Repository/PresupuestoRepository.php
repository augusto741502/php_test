<?php

namespace App\Repository;

use App\Entity\Presupuesto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Presupuesto>
 *
 * @method Presupuesto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Presupuesto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Presupuesto[]    findAll()
 * @method Presupuesto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PresupuestoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Presupuesto::class);
    }

    public function findAllPresupuesto(){

        $query = $this->getEntityManager()
        ->createQuery('
            SELECT  p.id, 
                    p.fecha,
                    p.n_presupuesto,
                    p.cliente,
                    p.email,
                    p.fono,
                    p.total,
                    p.estado
                    
            FROM 
                App:Presupuesto p
                WHERE p.estado =:estado

        ')
        ->setParameter('estado',0);
        return $query->getResult();
    }


    public function findAllPresupuestoFecha($inicio, $hasta){

        $query = $this->getEntityManager()
        ->createQuery('
            SELECT  p.id, 
                    p.fecha,
                    p.n_presupuesto,
                    p.cliente,
                    p.email,
                    p.fono,
                    p.total,
                    p.estado  
            FROM 
                App:Presupuesto p
                WHERE p.estado =:estado AND p.fecha BETWEEN :inicio AND :hasta

        ')
        ->setParameter('estado',0)
        ->setParameter('inicio',$inicio)
        ->setParameter('hasta',$hasta)
        ;
        return $query->getResult();
    }



    public function getPresupuesto($id){

        $query = $this->getEntityManager()
        ->createQuery('
            SELECT  p.id, 
                    p.fecha,
                    p.n_presupuesto,
                    p.cliente,
                    p.email,
                    p.fono,
                    p.total,
                    p.estado
                    
            FROM 
                App:Presupuesto p
                WHERE p.estado =:estado
                AND p.id =:id

        ')
        ->setParameter('id',$id)
        ->setParameter('estado',0);
        return $query->getResult();
    }

//    /**
//     * @return Presupuesto[] Returns an array of Presupuesto objects
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

//    public function findOneBySomeField($value): ?Presupuesto
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
