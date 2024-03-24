<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    'app_reservas' => [[], ['_controller' => 'App\\Controller\\ReservasController::index'], [], [['text', '/reservas']], [], [], []],
    'app_stock' => [[], ['_controller' => 'App\\Controller\\ReservasController::presupuestos'], [], [['text', '/presupuesto']], [], [], []],
    'recuperaReserva' => [['inicio', 'hasta'], ['_controller' => 'App\\Controller\\ReservasController::recuperaReserva'], [], [['variable', '/', '[^/]++', 'hasta', true], ['variable', '/', '[^/]++', 'inicio', true], ['text', '/api/reserva/clientes']], [], [], []],
    'recuperaServicio' => [[], ['_controller' => 'App\\Controller\\ReservasController::recuperaServicio'], [], [['text', '/api/reserva/servicio/']], [], [], []],
    'recuperaServicioLista' => [['fecha', 'instalacion', 'retiro'], ['_controller' => 'App\\Controller\\ReservasController::recuperaServicioLista'], [], [['variable', '/', '[^/]++', 'retiro', true], ['variable', '/', '[^/]++', 'instalacion', true], ['variable', '/', '[^/]++', 'fecha', true], ['text', '/api/reserva/serviciosLista']], [], [], []],
    'recuperaReservaEdita' => [['id'], ['_controller' => 'App\\Controller\\ReservasController::recuperaReservaEdita'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/reserva/clientes']], [], [], []],
    'actualizaReservaGuarda' => [[], ['_controller' => 'App\\Controller\\ReservasController::actualizaReservaGuarda'], [], [['text', '/api/reserva/clientes/guarda/']], [], [], []],
    'actualizaReservaEdita' => [[], ['_controller' => 'App\\Controller\\ReservasController::actualizaReservaEdita'], [], [['text', '/api/reserva/clientes/actualiza/']], [], [], []],
    'reservaElimina' => [[], ['_controller' => 'App\\Controller\\ReservasController::reservaElimina'], [], [['text', '/api/reserva/clientes/elimina/']], [], [], []],
    'recuperaServicioStock' => [[], ['_controller' => 'App\\Controller\\ReservasController::recuperaServicioStock'], [], [['text', '/api/reserva/servicios/stock']], [], [], []],
    'stockGuarda' => [[], ['_controller' => 'App\\Controller\\ReservasController::stockGuarda'], [], [['text', '/api/reserva/servicio/guarda/stock']], [], [], []],
    'recuperaServicioEdita' => [['id'], ['_controller' => 'App\\Controller\\ReservasController::recuperaServicioEdita'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/reserva/servicio/stock']], [], [], []],
    'actualizaStockEdita' => [[], ['_controller' => 'App\\Controller\\ReservasController::actualizaStockEdita'], [], [['text', '/api/reserva/stock/actualiza/']], [], [], []],
    'recuperaPresupuesto' => [['inicio', 'hasta'], ['_controller' => 'App\\Controller\\ReservasController::recuperaPresupuesto'], [], [['variable', '/', '[^/]++', 'hasta', true], ['variable', '/', '[^/]++', 'inicio', true], ['text', '/api/presupuesto/presupuestos']], [], [], []],
    'actualizaPresupuestoGuarda' => [[], ['_controller' => 'App\\Controller\\ReservasController::actualizaPresupuestoGuarda'], [], [['text', '/api/presupuesto/presupuestos/guarda/']], [], [], []],
    'recuperaPresupuestoEdita' => [['id'], ['_controller' => 'App\\Controller\\ReservasController::recuperaPresupuestoEdita'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/presupuesto/clientes']], [], [], []],
    'actualizaPresupuestoEdita' => [[], ['_controller' => 'App\\Controller\\ReservasController::actualizaPresupuestoEdita'], [], [['text', '/api/presupuesto/presupuestos/actualiza/']], [], [], []],
    'presupuestoElimina' => [[], ['_controller' => 'App\\Controller\\ReservasController::presupuestoElimina'], [], [['text', '/api/presupuesto/clientes/elimina/']], [], [], []],
    'app_pdf_generator' => [['id'], ['_controller' => 'App\\Controller\\ReservasController::pdf'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/pdf']], [], [], []],
];
