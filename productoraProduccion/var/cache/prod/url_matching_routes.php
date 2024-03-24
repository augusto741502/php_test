<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/reservas' => [[['_route' => 'app_reservas', '_controller' => 'App\\Controller\\ReservasController::index'], null, null, null, false, false, null]],
        '/presupuesto' => [[['_route' => 'app_stock', '_controller' => 'App\\Controller\\ReservasController::presupuestos'], null, null, null, false, false, null]],
        '/api/reserva/servicio' => [[['_route' => 'recuperaServicio', '_controller' => 'App\\Controller\\ReservasController::recuperaServicio'], null, ['GET' => 0], null, true, false, null]],
        '/api/reserva/servicios/stock' => [[['_route' => 'recuperaServicioStock', '_controller' => 'App\\Controller\\ReservasController::recuperaServicioStock'], null, ['GET' => 0], null, false, false, null]],
        '/api/reserva/servicio/guarda/stock' => [[['_route' => 'stockGuarda', '_controller' => 'App\\Controller\\ReservasController::stockGuarda'], null, ['POST' => 0], null, false, false, null]],
        '/api/reserva/stock/actualiza' => [[['_route' => 'actualizaStockEdita', '_controller' => 'App\\Controller\\ReservasController::actualizaStockEdita'], null, ['POST' => 0], null, true, false, null]],
        '/api/presupuesto/presupuestos/guarda' => [[['_route' => 'actualizaPresupuestoGuarda', '_controller' => 'App\\Controller\\ReservasController::actualizaPresupuestoGuarda'], null, ['POST' => 0], null, true, false, null]],
        '/api/presupuesto/presupuestos/actualiza' => [[['_route' => 'actualizaPresupuestoEdita', '_controller' => 'App\\Controller\\ReservasController::actualizaPresupuestoEdita'], null, ['POST' => 0], null, true, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api/(?'
                    .'|reserva/(?'
                        .'|clientes/(?'
                            .'|([^/]++)(?'
                                .'|/([^/]++)(*:58)'
                                .'|(*:65)'
                            .')'
                            .'|guarda(*:79)'
                            .'|actualiza(*:95)'
                            .'|elimina(*:109)'
                        .')'
                        .'|servicio(?'
                            .'|sLista/([^/]++)/([^/]++)/([^/]++)(*:162)'
                            .'|/stock/([^/]++)(*:185)'
                        .')'
                    .')'
                    .'|presupuesto/(?'
                        .'|presupuestos/([^/]++)/([^/]++)(*:240)'
                        .'|clientes/(?'
                            .'|([^/]++)(*:268)'
                            .'|elimina(*:283)'
                        .')'
                    .')'
                .')'
                .'|/pdf/([^/]++)(*:307)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        58 => [[['_route' => 'recuperaReserva', '_controller' => 'App\\Controller\\ReservasController::recuperaReserva'], ['inicio', 'hasta'], ['GET' => 0], null, false, true, null]],
        65 => [[['_route' => 'recuperaReservaEdita', '_controller' => 'App\\Controller\\ReservasController::recuperaReservaEdita'], ['id'], ['GET' => 0], null, false, true, null]],
        79 => [[['_route' => 'actualizaReservaGuarda', '_controller' => 'App\\Controller\\ReservasController::actualizaReservaGuarda'], [], ['POST' => 0], null, true, false, null]],
        95 => [[['_route' => 'actualizaReservaEdita', '_controller' => 'App\\Controller\\ReservasController::actualizaReservaEdita'], [], ['POST' => 0], null, true, false, null]],
        109 => [[['_route' => 'reservaElimina', '_controller' => 'App\\Controller\\ReservasController::reservaElimina'], [], ['POST' => 0], null, true, false, null]],
        162 => [[['_route' => 'recuperaServicioLista', '_controller' => 'App\\Controller\\ReservasController::recuperaServicioLista'], ['fecha', 'instalacion', 'retiro'], ['GET' => 0], null, false, true, null]],
        185 => [[['_route' => 'recuperaServicioEdita', '_controller' => 'App\\Controller\\ReservasController::recuperaServicioEdita'], ['id'], ['GET' => 0], null, false, true, null]],
        240 => [[['_route' => 'recuperaPresupuesto', '_controller' => 'App\\Controller\\ReservasController::recuperaPresupuesto'], ['inicio', 'hasta'], ['GET' => 0], null, false, true, null]],
        268 => [[['_route' => 'recuperaPresupuestoEdita', '_controller' => 'App\\Controller\\ReservasController::recuperaPresupuestoEdita'], ['id'], ['GET' => 0], null, false, true, null]],
        283 => [[['_route' => 'presupuestoElimina', '_controller' => 'App\\Controller\\ReservasController::presupuestoElimina'], [], ['POST' => 0], null, true, false, null]],
        307 => [
            [['_route' => 'app_pdf_generator', '_controller' => 'App\\Controller\\ReservasController::pdf'], ['id'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
