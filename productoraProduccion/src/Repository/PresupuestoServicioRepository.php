<?php

namespace App\Repository;

use App\Entity\PresupuestoServicio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PresupuestoServicio>
 *
 * @method PresupuestoServicio|null find($id, $lockMode = null, $lockVersion = null)
 * @method PresupuestoServicio|null findOneBy(array $criteria, array $orderBy = null)
 * @method PresupuestoServicio[]    findAll()
 * @method PresupuestoServicio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PresupuestoServicioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PresupuestoServicio::class);
    }


    public function getPresupuestoServicio($id){

        $query = $this->getEntityManager()
        ->createQuery('
            SELECT  
                    sp.id,
                    sp.id_presupuesto,
                    sp.servicio,
                    sp.valor,
                    sp.cantidad,
                    sp.subtotal
            FROM 
               App:PresupuestoServicio sp
            WHERE sp.id_presupuesto =:id

        ')
        ->setParameter('id',$id);
        return $query->getResult();
    }

//    /**
//     * @return PresupuestoServicio[] Returns an array of PresupuestoServicio objects
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

//    public function findOneBySomeField($value): ?PresupuestoServicio
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
