<?php

namespace App\Repository;

use App\Entity\Servicio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Servicio>
 *
 * @method Servicio|null find($id, $lockMode = null, $lockVersion = null)
 * @method Servicio|null findOneBy(array $criteria, array $orderBy = null)
 * @method Servicio[]    findAll()
 * @method Servicio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServicioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Servicio::class);
    }


    public function findAllServicio(){

        $query = $this->getEntityManager()
        ->createQuery('
            SELECT  s.id, 
                    s.producto
            FROM 
                App:Servicio s
                JOIN App:Stock st WITH s.id = st.id_servicio
                WHERE st.estado =:id

        ')
        ->setParameter('id',1);
        return $query->getResult();
    }


    public function findServicio($ids){

        //dd(explode(",",$ids));

        $query = $this->getEntityManager()
        ->createQuery('
            SELECT  s.id, 
                    s.producto
            FROM 
                App:Servicio s

            WHERE s.id IN (:id)
        ')
        ->setParameter('id',explode(",",$ids));
        return $query->getResult();
    }


    public function getAllServicios(){

        $query = $this->getEntityManager()
        ->createQuery('
            SELECT  s.id, 
                    s.producto, 
                    st.cantidad,
                    st.estado
            FROM 
                App:Servicio s
            JOIN App:Stock st WITH s.id = st.id_servicio
           
        ');
        return $query->getResult();
    }




    public function getServicio($id){

        $query = $this->getEntityManager()
        ->createQuery('
        SELECT  s.id, 
                s.producto, 
                st.cantidad,
                st.id as idStock,
                st.estado
        FROM 
            App:Servicio s
        JOIN App:Stock st WITH s.id = st.id_servicio
            
            WHERE s.id =:id
        ')
        ->setParameter('id',$id);
        return $query->getResult();
    }

//    /**
//     * @return Servicio[] Returns an array of Servicio objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Servicio
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
