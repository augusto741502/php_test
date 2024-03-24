<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
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
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/api/(?'
                    .'|reserva/(?'
                        .'|clientes/(?'
                            .'|([^/]++)(?'
                                .'|/([^/]++)(*:220)'
                                .'|(*:228)'
                            .')'
                            .'|guarda(*:243)'
                            .'|actualiza(*:260)'
                            .'|elimina(*:275)'
                        .')'
                        .'|servicio(?'
                            .'|sLista/([^/]++)/([^/]++)/([^/]++)(*:328)'
                            .'|/stock/([^/]++)(*:351)'
                        .')'
                    .')'
                    .'|presupuesto/(?'
                        .'|presupuestos/([^/]++)/([^/]++)(*:406)'
                        .'|clientes/(?'
                            .'|([^/]++)(*:434)'
                            .'|elimina(*:449)'
                        .')'
                    .')'
                .')'
                .'|/pdf/([^/]++)(*:473)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        220 => [[['_route' => 'recuperaReserva', '_controller' => 'App\\Controller\\ReservasController::recuperaReserva'], ['inicio', 'hasta'], ['GET' => 0], null, false, true, null]],
        228 => [[['_route' => 'recuperaReservaEdita', '_controller' => 'App\\Controller\\ReservasController::recuperaReservaEdita'], ['id'], ['GET' => 0], null, false, true, null]],
        243 => [[['_route' => 'actualizaReservaGuarda', '_controller' => 'App\\Controller\\ReservasController::actualizaReservaGuarda'], [], ['POST' => 0], null, true, false, null]],
        260 => [[['_route' => 'actualizaReservaEdita', '_controller' => 'App\\Controller\\ReservasController::actualizaReservaEdita'], [], ['POST' => 0], null, true, false, null]],
        275 => [[['_route' => 'reservaElimina', '_controller' => 'App\\Controller\\ReservasController::reservaElimina'], [], ['POST' => 0], null, true, false, null]],
        328 => [[['_route' => 'recuperaServicioLista', '_controller' => 'App\\Controller\\ReservasController::recuperaServicioLista'], ['fecha', 'instalacion', 'retiro'], ['GET' => 0], null, false, true, null]],
        351 => [[['_route' => 'recuperaServicioEdita', '_controller' => 'App\\Controller\\ReservasController::recuperaServicioEdita'], ['id'], ['GET' => 0], null, false, true, null]],
        406 => [[['_route' => 'recuperaPresupuesto', '_controller' => 'App\\Controller\\ReservasController::recuperaPresupuesto'], ['inicio', 'hasta'], ['GET' => 0], null, false, true, null]],
        434 => [[['_route' => 'recuperaPresupuestoEdita', '_controller' => 'App\\Controller\\ReservasController::recuperaPresupuestoEdita'], ['id'], ['GET' => 0], null, false, true, null]],
        449 => [[['_route' => 'presupuestoElimina', '_controller' => 'App\\Controller\\ReservasController::presupuestoElimina'], [], ['POST' => 0], null, true, false, null]],
        473 => [
            [['_route' => 'app_pdf_generator', '_controller' => 'App\\Controller\\ReservasController::pdf'], ['id'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
