<?php

namespace App\Repository;

use App\Entity\Reserva;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Reserva>
 *
 * @method Reserva|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reserva|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reserva[]    findAll()
 * @method Reserva[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reserva::class);
    }


    public function findEstadoServicio(){

        $query = $this->getEntityManager()
            ->createQuery('
                    select c.fecha, r.ids_servicio 
                    from 
                    App:Cliente c
                    JOIN App:Reserva r WITH r.id_cliente = c.id 
                    JOIN App:Horario h WITH h.id = r.id_horario
                    WHERE c.fecha=:fecha AND c.estado =:estado AND (h.instalacion <=:instalacion OR h.inicio >=:inicio OR h.retiro <=:retiro )GROUP BY c.fecha
                ')
            ->setParameter('estado',0)
            ->setParameter('fecha',date('Y-m-d'))
            ->setParameter('instalacion',date('H:m'))
            ->setParameter('inicio',date('H:m'))
            ->setParameter('retiro',date('H:m'));

            return $query->getResult();
    }


    public function findEstadoServicioLista($fecha, $instalacion, $retiro){

        $sql = '
        select c.fecha, r.ids_servicio 
        from 
        App:Cliente c
        JOIN App:Reserva r WITH r.id_cliente = c.id 
        JOIN App:Horario h WITH h.id = r.id_horario
        WHERE c.fecha=:fecha AND c.estado =:estado AND (h.instalacion =:instalacion OR h.retiro =:retiro )GROUP BY c.fecha';

        $query = $this->getEntityManager()
          ->createQuery($sql)
          ->setParameter('estado',0)
          ->setParameter('fecha',$fecha)
          ->setParameter('instalacion',$instalacion)
          ->setParameter('retiro',$retiro);
          return $query->getResult();
  }
  


//    /**
//     * @return Reserva[] Returns an array of Reserva objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Reserva
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
