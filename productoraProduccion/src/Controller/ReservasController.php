<?php

namespace App\Controller;

use App\Entity\Cliente;
use App\Entity\Reserva;
use App\Entity\Horario;
use App\Entity\Stock;
use App\Entity\Servicio;
use App\Entity\Presupuesto;
use App\Entity\PresupuestoServicio;
use App\Repository\ClienteRepository;
use App\Repository\ServicioRepository;
use App\Repository\ReservaRepository;
use App\Repository\PresupuestoRepository;
use App\Repository\PresupuestoServicioRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Dompdf\Dompdf;

use App\_Servicios\MailService;

class ReservasController extends AbstractController
{

    public $clienteRepository;
    public $servicioRepository;
    public $reservaRepository;
    public $presupuestoRepository;
    public $presupuestoServicioRepository;

    public function __construct(ClienteRepository $clienteRepository, ServicioRepository $servicioRepository, ReservaRepository $reservaRepository, PresupuestoRepository $presupuestoRepository, PresupuestoServicioRepository $presupuestoServicioRepository)
    {
        $this->clienteRepository = $clienteRepository;
        $this->servicioRepository = $servicioRepository;
        $this->reservaRepository = $reservaRepository;
        $this->presupuestoRepository = $presupuestoRepository;
        $this->presupuestoServicioRepository = $presupuestoServicioRepository;
    }

    #[Route('/reservas', name: 'app_reservas')]
    public function index(): Response
    {
        return $this->render('reservas/index.html.twig', [
            'controller_name' => 'ReservasController',
            'date'=>date('d-m-Y H:m:s' )
        ]);
    }

    #[Route('/stock', name: 'app_stock')]
    public function stock(): Response
    {
        return $this->render('stock/index.html.twig', [
            'controller_name' => 'ReservasController',
            'date'=>date('d-m-Y H:m:s' )
        ]);
    }


    #[Route('/presupuesto', name: 'app_presupuestos')]
    public function presupuestos(): Response
    {
        return $this->render('presupuesto/index.html.twig', [
            'controller_name' => 'ReservasController',
            'date'=>date('d-m-Y H:m:s' )
        ]);
    }

    #[Route('/api/reserva/clientes/{inicio}/{hasta}', name: 'recuperaReserva',  methods:['GET'])]
    public function recuperaReserva(Request $request, $inicio, $hasta):Response
    {

        if($inicio=='null' && $hasta=='null'){
            $cliente = $this->clienteRepository->getAllClientes();
        }else{
            $cliente = $this->clienteRepository->getClienteFecha($inicio, $hasta);
        }
       
        $data = [];
       
        foreach ($cliente as $servi) {
            $producto=[];
            $idproducto=[];
            $servicio = $this->servicioRepository->findServicio($servi['ids_servicio']);
            
            if($servi['estado']==0){
                $estado = 'En reserva';
            }else{
                $estado='Liberado';
            }
            
            foreach ($servicio as $v) {
                $producto[]     = $v['producto'];
                $idproducto[]     =   $v['id'];
            }
            
            $data[] = [
                'id'            => $servi['id'],
                'fecha'         => $servi['fecha'],
                'direccion'     => $servi['direccion'],
                'nombre'        => $servi['nombre'],
                'correo'        => $servi['correo'],
                'telefono'      => $servi['telefono'],
                'valor'         => $servi['valor'],
                'instalacion'   => $servi['instalacion'],
                'inicio'        => $servi['inicio'],
                'retiro'        => $servi['retiro'],
                'reserva'       => $servi['reserva'],
                'servicio'      => $producto,
                'idServicio'    => $idproducto,
                'estado'        => $estado,
                'iva'           => $servi['iva']
            ];
        }
        return $this->json([
            'succes'    => true,
            'data'      => $data
        ]);
    }


    #[Route('/api/reserva/servicio/', name: 'recuperaServicio',  methods:['GET'])]
    public function recuperaServicio(Request $request):Response
    {

        $reserva = $this->reservaRepository->findEstadoServicio();
        $servicio = $this->servicioRepository->findAllServicio();
        
    $data = [];
    $dato = [];
        if(count($reserva)>0){
    
            foreach ($reserva as $value) {
                //dd($value['ids_servicio']);
                array_push($dato,  $value['ids_servicio']);
                
            }
 
           $string = implode(",", $dato);
           $explode = explode(",",$string);
           
            foreach ($servicio as $servi) {
                
                
                if(  !in_array($servi['id'],  $explode) ){
                    $data[] = [
                        'id' => $servi['id'],
                        'producto' => $servi['producto']
                    ];
                }
            }

        }else{
            
            foreach ($servicio as $servi) {
                
                $data[] = [
                    'id' => $servi['id'],
                    'producto' => $servi['producto']
                ];
            }
        }

        return $this->json([
            'succes'    => true,
            'data'      => $data
        ]);
    }


    #[Route('/api/reserva/serviciosLista/{fecha}/{instalacion}/{retiro}', name: 'recuperaServicioLista',  methods:['GET'])]
    public function recuperaServicioLista(Request $request, $fecha, $instalacion, $retiro):Response
    {

        $reserva = $this->reservaRepository->findEstadoServicioLista($fecha, $instalacion, $retiro);
        $servicio = $this->servicioRepository->findAllServicio();
        
        $data = [];
        $dato = [];
        if(count($reserva)>0){
    
            foreach ($reserva as $value) {
                //dd($value['ids_servicio']);
                array_push($dato,  $value['ids_servicio']);
            }
 
           $string = implode(",", $dato);
           $explode = explode(",",$string);
            foreach ($servicio as $servi) {
                
                if(in_array($servi['id'],  $explode)){
                    $data[] = [
                        'id' => $servi['id'],
                        'producto' => $servi['producto']
                    ];
                }
            }

        }
        return $this->json([
            'succes'    => true,
            'data'      => $data
        ]);
    }
    

    #[Route('/api/reserva/clientes/{id}', name: 'recuperaReservaEdita',  methods:['GET'])]
    public function recuperaReservaEdita(Request $request, $id):Response
    {
        $cliente = $this->clienteRepository->getCliente($id);

        $data = [];
        $servicio = $this->servicioRepository->findAllServicio();
        $lista = [];

        foreach ($servicio as $servi) {
            $lista[] = [
                'id' => $servi['id'],
                'producto' => $servi['producto']
            ];
        }

        foreach ($cliente as $servi) {
            $producto=[];
            $idproducto=[];

            $servicio = $this->servicioRepository->findServicio($servi['ids_servicio']);
            foreach ($servicio as $v) {
                $producto[]     = $v['producto'];
                $idproducto[]   = $v['id'];
            }
            
            $data[] = [
                'id'            => $servi['id'],
                'fecha'         => $servi['fecha'],
                'direccion'     => $servi['direccion'],
                'nombre'        => $servi['nombre'],
                'correo'        => $servi['correo'],
                'telefono'      => $servi['telefono'],
                'valor'         => $servi['valor'],
                'instalacion'   => $servi['instalacion'],
                'inicio'        => $servi['inicio'],
                'retiro'        => $servi['retiro'],
                'reserva'       => $servi['reserva'],
                'idReserva'     => $servi['idReserva'],
                'servicio'      => $producto,
                'idServicio'    => $idproducto,
                'lista'         => $lista,
                'iva'           => $servi['iva']
            ];
        }
        return $this->json([
            'succes'    => true,
            'data'      => $data
        ]);
    }

    #[Route('/api/reserva/clientes/guarda/', name: 'actualizaReservaGuarda',  methods:['POST'])]
    public function actualizaReservaGuarda(Request $request, ManagerRegistry $doctrine):Response
    {

        $data = json_decode($request->getContent(),true);
  
        $datosCliente = [];
        parse_str($data['formulario'], $datosCliente);

        $entityManager = $doctrine->getManager();
        $cliente =     new Cliente();
        $cliente->setFecha($datosCliente['fecha']);
        $cliente->setNombre($datosCliente['nombre']);
        $cliente->setDireccion( $datosCliente['direccion']);
        $cliente->setCorreo($datosCliente['email']);         
        $cliente->setTelefono($datosCliente['telefono']);
        $cliente->setValor(str_replace(".","",$datosCliente['valor']));
        $cliente->setIva($datosCliente['iva']);
        $cliente->setEstado(0);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($cliente);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        $horario =     new Horario();
        $horario->setInstalacion($datosCliente['instalacion']);
        $horario->setInicio($datosCliente['inicio']);
        $horario->setRetiro($datosCliente['retiro']);
          
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($horario);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        $reserva =     new Reserva();
        $reserva->setReserva($datosCliente['reserva']);
        $reserva->setIdCliente($cliente->getId());
        $reserva->setIdHorario($horario->getId());
        $reserva->setIdsServicio(implode(",",$datosCliente['servicio']));   
        
        $servicios = implode(",",$datosCliente['servicio']);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($reserva);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        
        
        $producto=[];
        
         foreach ($datosCliente['servicio'] as $id) {
            $servicio = $this->servicioRepository->findServicio($id);
            foreach ($servicio as $v) {
                $producto[]     = $v['producto'];
            }
         }

        $titulo='Reserva servicio evento';
        $envioMail = new MailService(); 

        $envioMail->envioEmailReserva(
            $datosCliente['email'], 
            $datosCliente['nombre'], 
                    $datosCliente['fecha'], 
                    $datosCliente['instalacion'], 
                    $datosCliente['inicio'], 
                    $datosCliente['retiro'], 
                    $producto, 
                    str_replace(".","",$datosCliente['valor']),  
                    $titulo, 
                    $datosCliente['reserva']);
        
        return $this->json([
            'succes'    => true,
            'data'      => true
        ]);
 
    }


    #[Route('/api/reserva/clientes/actualiza/', name: 'actualizaReservaEdita',  methods:['POST'])]
    public function actualizaReservaEdita(Request $request,EntityManagerInterface $entityManager):Response
    {
        $data = json_decode($request->getContent(),true);

        $datosCliente = [];
        parse_str($data['formulario'], $datosCliente);


        $cliente = $entityManager->getRepository(Cliente::class)->find($data['id']);

        if (!$cliente) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        $cliente->setFecha($datosCliente['fecha']);
        $cliente->setNombre($datosCliente['nombre']);
        $cliente->setDireccion( $datosCliente['direccion']);
        $cliente->setCorreo($datosCliente['email']);         
        $cliente->setTelefono($datosCliente['telefono']);
        $cliente->setValor(str_replace(".","",$datosCliente['valor']));
        $cliente->setIva($datosCliente['iva']);
        
        $reserva = $entityManager->getRepository(Reserva::class)->find($data['idReserva']);

        if (!$reserva) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        $reserva->setReserva($datosCliente['reserva']);
        $reserva->setIdsServicio(implode(",",$datosCliente['servicio']));
        
        
        $horario = $entityManager->getRepository(Horario::class)->find($reserva->getIdHorario());
        if (!$reserva) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        $horario->setInstalacion($datosCliente['instalacion']);
        $horario->setInicio($datosCliente['inicio']);
        $horario->setRetiro($datosCliente['retiro']); 
        
           $entityManager->flush();
        
        $producto=[];
        
         foreach ($datosCliente['servicio'] as $id) {
            $servicio = $this->servicioRepository->findServicio($id);
            foreach ($servicio as $v) {
                $producto[]     = $v['producto'];
            }
         }
         
         
        $titulo='Modificacion Reserva servicio evento';
        $envioMail = new MailService(); 
        $envioMail->envioEmailReserva($datosCliente['email'], $datosCliente['nombre'], $datosCliente['fecha'], $datosCliente['instalacion'], $datosCliente['inicio'], $datosCliente['retiro'], $producto, str_replace(".","",$datosCliente['valor']), $titulo,$reserva);

     
        return $this->json([
            'succes'    => true,
            'data'      => true
        ]);
    }


    #[Route('/api/reserva/clientes/elimina/', name: 'reservaElimina',  methods:['POST'])]
    public function reservaElimina(Request $request,EntityManagerInterface $entityManager):Response
    {
        $data = json_decode($request->getContent(),true);
        $cliente = $entityManager->getRepository(Cliente::class)->find($data['id']);

        if (!$cliente) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        $cliente->setEstado(1);
        $entityManager->flush();

        return $this->json([
            'succes'    => true,
            'data'      => true
        ]);

    }

    #[Route('/api/reserva/servicios/stock', name: 'recuperaServicioStock',  methods:['GET'])]
    public function recuperaServicioStock(Request $request):Response
    {
        $servicio = $this->servicioRepository->getAllServicios();
        $data = [];

        foreach ($servicio as $servi) {

            switch ($servi['estado']) {
                case 1:
                    $estado = 'Disponible';
                break;
                case 2:
                    $estado = 'Mantencion';
                break;

                case 3:
                    $estado = 'No Disponible';
                break;
 
            }
            $data[] = [
                'id' => $servi['id'],
                'producto' => $servi['producto'],
                'cantidad' => $servi['cantidad'],
                'estado' => $estado
            ];
        }

        return $this->json([
            'succes'    => true,
            'data'      => $data
        ]);
    }


    #[Route('/api/reserva/servicio/guarda/stock', name: 'stockGuarda',  methods:['POST'])]
    public function stockGuarda(Request $request, ManagerRegistry $doctrine):Response
    {

        $data = json_decode($request->getContent(),true);
  
        $datosCliente = [];
        parse_str($data['formulario'], $datosCliente);

        $entityManager = $doctrine->getManager();
        $servicio =     new Servicio();
      
        $servicio->setProducto($datosCliente['servicio']);
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($servicio);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();


        $stock =     new Stock();
        $stock->setIdServicio($servicio->getId());
        $stock->setCantidad($datosCliente['cantidad']);
        $stock->setEstado(1);
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($stock);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->json([
            'succes'    => true,
            'data'      => true
        ]);
 
    }

    #[Route('/api/reserva/servicio/stock/{id}', name: 'recuperaServicioEdita',  methods:['GET'])]
    public function recuperaServicioEdita(Request $request, $id):Response
    {
        $servicio = $this->servicioRepository->getServicio($id);
        $data = [];
        foreach ($servicio as $servi) {
            $data[] = [
                'id' => $servi['id'],
                'idStock' => $servi['idStock'],
                'producto' => $servi['producto'],
                'cantidad' => $servi['cantidad'],
                'estado'   => $servi['estado']
            ];
        }

        return $this->json([
            'succes'    => true,
            'data'      => $data
        ]);
    }



    #[Route('/api/reserva/stock/actualiza/', name: 'actualizaStockEdita',  methods:['POST'])]
    public function actualizaStockEdita(Request $request,EntityManagerInterface $entityManager):Response
    {
        $data = json_decode($request->getContent(),true);

        $datosCliente = [];
        parse_str($data['formulario'], $datosCliente);


        $servicio = $entityManager->getRepository(Servicio::class)->find($data['id']);

        if (!$servicio) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        $servicio->setProducto($datosCliente['producto']);
        
        
        $stock = $entityManager->getRepository(Stock::class)->find($data['idStock']);

        if (!$stock) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        $stock->setEstado($datosCliente['estado']);
        $stock->setCantidad($datosCliente['cantidad']);
        
    
        $entityManager->flush();
        return $this->json([
            'succes'    => true,
            'data'      => true
        ]);
    }



    #[Route('/api/presupuesto/presupuestos/{inicio}/{hasta}', name: 'recuperaPresupuesto',  methods:['GET'])]
    public function recuperaPresupuesto(Request $request, $inicio, $hasta):Response
    {

        if($inicio=='null' && $hasta=='null'){
            $cliente = $this->presupuestoRepository->findAllPresupuesto();
        }else{
            $cliente = $this->presupuestoRepository->findAllPresupuestoFecha($inicio, $hasta);
        }
       
        $data = [];
       
        foreach ($cliente as $servi) {

            $data[] = [
                'id'                => $servi['id'],
                'fecha'             => $servi['fecha'],
                'n_presupuesto'     => $servi['n_presupuesto'],
                'cliente'           => $servi['cliente'],
                'email'             => $servi['email'],
                'fono'              => $servi['fono'],
                'total'             => $servi['total']
            ];
        }
        return $this->json([
            'succes'    => true,
            'data'      => $data
        ]);
    }



    #[Route('/api/presupuesto/presupuestos/guarda/', name: 'actualizaPresupuestoGuarda',  methods:['POST'])]
    public function actualizaPresupuestoGuarda(Request $request, ManagerRegistry $doctrine):Response
    {

        $data = json_decode($request->getContent(),true);
  
        $datosCliente = [];
        parse_str($data['formulario'], $datosCliente);

        $entityManager = $doctrine->getManager();
        $cliente =     new Presupuesto();
        $cliente->setFecha($datosCliente['fecha']);
        $cliente->setNpresupuesto($datosCliente['n_presupuesto']);
        $cliente->setCliente( $datosCliente['para']);
        $cliente->setEmail($datosCliente['email']);         
        $cliente->setFono($datosCliente['fono']);
        $cliente->setEstado(0);
        $cliente->setTotal(1000000);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($cliente);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        $lista=[];
     for ($i=1;$i<=$datosCliente['cantidades'];$i++){

        $lista[$i]=[
            "servicio" => $datosCliente['servicio_'.$i], 
            "valor"=>$datosCliente['valor_'.$i], 
            "cantidad"=>$datosCliente['cant_'.$i], 
            "subtotal"=>$datosCliente['subtotal_'.$i]];

        $reserva =     new PresupuestoServicio();
        $reserva->setServicio($datosCliente['servicio_'.$i]);
        $reserva->setValor($datosCliente['valor_'.$i]);
        $reserva->setCantidad($datosCliente['cant_'.$i]);
        $reserva->setSubtotal($datosCliente['subtotal_'.$i]);
        $reserva->setIdPresupuesto($cliente->getId());
  
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($reserva);
        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

     }

    
     $titulo='Presupuesto';
     $envioMail = new MailService(); 
     $envioMail->envioEmailPresupuesto($datosCliente['fecha'], $datosCliente['npresupuesto'], $datosCliente['para'], $datosCliente['email'], $datosCliente['fono'],$titulo, $lista);

        return $this->json([
            'succes'    => true,
            'data'      => true
        ]);
 
    }

    #[Route('/api/presupuesto/clientes/{id}', name: 'recuperaPresupuestoEdita',  methods:['GET'])]
    public function recuperaPresupuestoEdita(Request $request, $id):Response
    {

        $cliente = $this->presupuestoRepository->getPresupuesto((int)$id);
        $lista = [];
        foreach ($cliente as $servi) {
            $servicio = $this->presupuestoServicioRepository->getPresupuestoServicio((int)$id);
            foreach ($servicio as $i => $v) {
                $lista[$i]=[
                            "id"=>$v['id'],
                            "servicio" => $v['servicio'], 
                            "valor"=>$v['valor'], 
                            "cantidad"=>$v['cantidad'], 
                            "subtotal"=>$v['subtotal']];
            }
            
            $data[] = [
                'id'                => $servi['id'],
                'fecha'             => $servi['fecha'],
                'n_presupuesto'     => $servi['n_presupuesto'],
                'cliente'           => $servi['cliente'],
                'correo'            => $servi['email'],
                'telefono'          => $servi['fono'],
                'valor'             => $servi['total'],
                'lista'             => $lista,
        
            ];
        }
        return $this->json([
            'succes'    => true,
            'data'      => $data
        ]);
    }



    #[Route('/api/presupuesto/presupuestos/actualiza/', name: 'actualizaPresupuestoEdita',  methods:['POST'])]
    public function actualizaPresupuestoEdita(Request $request,EntityManagerInterface $entityManager):Response
    {
        $data = json_decode($request->getContent(),true);

        $datosCliente = [];
        parse_str($data['formulario'], $datosCliente);
        $cliente = $entityManager->getRepository(Presupuesto::class)->find($data['id']);

        if (!$cliente) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        $cliente->setFecha($datosCliente['fecha']);
        $cliente->setNpresupuesto($datosCliente['npresupuesto']);
        $cliente->setCliente( $datosCliente['para']);
        $cliente->setEmail($datosCliente['email']);         
        $cliente->setFono($datosCliente['fono']);
        $cliente->setEstado(0);
        $lista=[];
        $monto = 0;
        for ($i=1;$i<=$datosCliente['cantidades'];$i++){
            $monto = $monto + $datosCliente['valor_'.$i];
            $lista[$i]=[
                "servicio" => $datosCliente['servicio_'.$i], 
                "valor"=>$datosCliente['valor_'.$i], 
                "cantidad"=>$datosCliente['cant_'.$i], 
                "subtotal"=>$datosCliente['subtotal_'.$i]];
            if($datosCliente['ids_'.$i] !=0){

              
                
                $reserva = $entityManager->getRepository(PresupuestoServicio::class)->find($datosCliente['ids_'.$i]);
                $reserva->setServicio($datosCliente['servicio_'.$i]);
                $reserva->setValor($datosCliente['valor_'.$i]);
                $reserva->setCantidad($datosCliente['cant_'.$i]);
                $reserva->setSubtotal($datosCliente['subtotal_'.$i]);
                $reserva->setIdPresupuesto($cliente->getId());
                // tell Doctrine you want to (eventually) save the Product (no queries yet)
                $entityManager->persist($reserva);
        
                // actually executes the queries (i.e. the INSERT query)
                $entityManager->flush();

            }else{
                $reserva =     new PresupuestoServicio();
                $reserva->setServicio($datosCliente['servicio_'.$i]);
                $reserva->setValor($datosCliente['valor_'.$i]);
                $reserva->setCantidad($datosCliente['cant_'.$i]);
                $reserva->setSubtotal($datosCliente['subtotal_'.$i]);
                $reserva->setIdPresupuesto($cliente->getId());
          
                // tell Doctrine you want to (eventually) save the Product (no queries yet)
                $entityManager->persist($reserva);
                // actually executes the queries (i.e. the INSERT query)
                $entityManager->flush();
            }

            $cliente->setTotal($monto);

         }



         $titulo='Presupuesto';
         $envioMail = new MailService(); 
         $envioMail->envioEmailPresupuesto($datosCliente['fecha'], $datosCliente['npresupuesto'], $datosCliente['para'], $datosCliente['email'], $datosCliente['fono'],$titulo, $lista);

         
        return $this->json([
            'succes'    => true,
            'data'      => true
        ]);
    }


    #[Route('/api/presupuesto/clientes/elimina/', name: 'presupuestoElimina',  methods:['POST'])]
    public function presupuestoElimina(Request $request,EntityManagerInterface $entityManager):Response
    {
        $data = json_decode($request->getContent(),true);
        $cliente = $entityManager->getRepository(Presupuesto::class)->find($data['id']);

        if (!$cliente) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        $cliente->setEstado(1);
        $entityManager->flush();

        return $this->json([
            'succes'    => true,
            'data'      => true
        ]);

    }



    #[Route('/pdf/{id}', name: 'app_pdf_generator' ,  methods:['GET'])]
    public function pdf(Request $request, $id): Response
    {
        $cliente = $this->presupuestoRepository->getPresupuesto((int)$id);
        $lista = [];
   
        foreach ($cliente as $servi) {
            $servicio = $this->presupuestoServicioRepository->getPresupuestoServicio((int)$id);
            $valor1 = 0;
            $valor2 = 0;
            $valor3 = 0;
            foreach ($servicio as $i => $v) {


                $valor1 = $valor1 + $v['valor'];
                $valor2 = $valor2 + $v['cantidad'];
                $valor3 = $valor3 + $v['subtotal'];


                $iva = $valor3 * 0.19;
                $valoriva =  $valor3 + $iva;
                $lista[$i]=[
                            "id"=>$v['id'],
                            "servicio"  =>$v['servicio'], 
                            "valor"     =>$v['valor'], 
                            "cantidad"  =>$v['cantidad'], 
                            "subtotal"  =>$v['subtotal']];
            }
            
            $data = [
                'imageSrc'  => $this->imageToBase64($this->getParameter('kernel.project_dir') . '/public/img/logoProductora.jpeg'),
                'id'                => $servi['id'],
                'fecha'             => $servi['fecha'],
                'n_presupuesto'     => $servi['n_presupuesto'],
                'cliente'           => $servi['cliente'],
                'correo'            => $servi['email'],
                'telefono'          => $servi['fono'],
                'valor'             => $servi['total'],
                'lista'             => $lista,
                'valor1_'            => $valor1,
                'valor2_'            => $valor2,
                'valor3_'            => $valor3,
                'valoriva'          => $valoriva,
                'iva'               => $iva
        
            ];
        }
   
        $html =  $this->renderView('pdf/index.html.twig', $data);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();
         
        return new Response (
            $dompdf->stream("dompdf_out.pdf", array("Attachment" => false)),
            Response::HTTP_OK,
            ['Content-Type' => 'application/pdf']
        );
    }


    private function imageToBase64($path) {
        $path = $path;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }
}
