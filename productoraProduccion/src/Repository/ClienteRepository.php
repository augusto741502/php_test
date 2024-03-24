<?php

namespace App\Repository;

use App\Entity\Cliente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cliente>
 *
 * @method Cliente|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cliente|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cliente[]    findAll()
 * @method Cliente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClienteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cliente::class);
    }


    public function getAllClientes(){

        $query = $this->getEntityManager()
        ->createQuery('
            SELECT  c.id, 
                    c.fecha, 
                    c.nombre, 
                    c.direccion, 
                    c.correo ,
                    c.telefono ,
                    c.valor,
                    c.estado,
                    c.iva,
                    h.instalacion, 
                    h.inicio, 
                    h.retiro,
                    r.reserva,
                    r.ids_servicio
            FROM 
                App:Cliente c
            JOIN App:Reserva r WITH r.id_cliente = c.id 
            JOIN App:Horario h WITH h.id = r.id_horario
            WHERE c.estado=0
        ');
        return $query->getResult();
    }

    public function getCliente($id){

        $query = $this->getEntityManager()
        ->createQuery('
            SELECT  c.id, 
                    c.fecha, 
                    c.nombre, 
                    c.direccion, 
                    c.correo ,
                    c.telefono ,
                    c.valor,
                    c.estado,
                    c.iva,
                    h.instalacion, 
                    h.inicio, 
                    h.retiro,
                    r.reserva,
                    r.ids_servicio,
                    r.id as idReserva
            FROM 
                App:Cliente c
            JOIN App:Reserva r WITH r.id_cliente = c.id 
            JOIN App:Horario h WITH h.id = r.id_horario
            WHERE c.id =:id
        ')
        ->setParameter('id',$id);
        return $query->getResult();
    }

    public function getClienteFecha($inicio, $hasta){

        $query = $this->getEntityManager()
        ->createQuery('
            SELECT  c.id, 
                    c.fecha, 
                    c.nombre, 
                    c.direccion, 
                    c.correo ,
                    c.telefono ,
                    c.valor,
                    c.iva,
                    h.instalacion, 
                    h.inicio, 
                    h.retiro,
                    r.reserva,
                    r.ids_servicio,
                    r.id as idReserva
            FROM 
                App:Cliente c
            JOIN App:Reserva r WITH r.id_cliente = c.id 
            JOIN App:Horario h WITH h.id = r.id_horario
            WHERE c.fecha BETWEEN :inicio AND :hasta
        ')
        ->setParameter('inicio',$inicio)
        ->setParameter('hasta',$hasta);
        return $query->getResult();
    }



    public function putCliente($arrayCliente){

            $userIncrement =     new Cliente();
            $userIncrement->setFecha($arrayCliente['fecha']);
            $userIncrement->setNombre($arrayCliente['nombre']);
            $userIncrement->setDireccion( $arrayCliente['direccion']);
            $userIncrement->setCorreo($arrayCliente['email']);         
            $userIncrement->setTelefono($arrayCliente['telefono']);
            $userIncrement->setValor($arrayCliente['valor']);
    


    }

    public function putReserva($id){

      /*  $query = $this->getEntityManager()
        ->createQuery('
        INSERT INTO db_productora.reserva
                    (id, reserva, id_cliente, id_horario, ids_servicio)
                    VALUES(0, '', 0, 0, '')
        ')
        ->setParameter('id',$id);
        return $query->getResult();*/
    }

    public function putHorario($id){

        /*$query = $this->getEntityManager()
        ->createQuery('
        INSERT INTO db_productora.horario
                    (id, instalacion, inicio, retiro)
                    VALUES(0, '', '', '')
        ')
        ->setParameter('id',$id);
        return $query->getResult();*/
    }

//    /**
//     * @return Cliente[] Returns an array of Cliente objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Cliente
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
