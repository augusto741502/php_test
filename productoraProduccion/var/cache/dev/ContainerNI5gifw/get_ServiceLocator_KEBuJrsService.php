<?php

namespace ContainerNI5gifw;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_KEBuJrsService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.kEBuJrs' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.kEBuJrs'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'App\\Controller\\ReservasController::actualizaPresupuestoEdita' => ['privates', '.service_locator.CsMkqUa', 'get_ServiceLocator_CsMkqUaService', true],
            'App\\Controller\\ReservasController::actualizaPresupuestoGuarda' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\ReservasController::actualizaReservaEdita' => ['privates', '.service_locator.CsMkqUa', 'get_ServiceLocator_CsMkqUaService', true],
            'App\\Controller\\ReservasController::actualizaReservaGuarda' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\ReservasController::actualizaStockEdita' => ['privates', '.service_locator.CsMkqUa', 'get_ServiceLocator_CsMkqUaService', true],
            'App\\Controller\\ReservasController::reservaElimina' => ['privates', '.service_locator.CsMkqUa', 'get_ServiceLocator_CsMkqUaService', true],
            'App\\Controller\\ReservasController::stockGuarda' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Controller\\ReservasController:actualizaPresupuestoEdita' => ['privates', '.service_locator.CsMkqUa', 'get_ServiceLocator_CsMkqUaService', true],
            'App\\Controller\\ReservasController:actualizaPresupuestoGuarda' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\ReservasController:actualizaReservaEdita' => ['privates', '.service_locator.CsMkqUa', 'get_ServiceLocator_CsMkqUaService', true],
            'App\\Controller\\ReservasController:actualizaReservaGuarda' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'App\\Controller\\ReservasController:actualizaStockEdita' => ['privates', '.service_locator.CsMkqUa', 'get_ServiceLocator_CsMkqUaService', true],
            'App\\Controller\\ReservasController:reservaElimina' => ['privates', '.service_locator.CsMkqUa', 'get_ServiceLocator_CsMkqUaService', true],
            'App\\Controller\\ReservasController:stockGuarda' => ['privates', '.service_locator.o6sN0hZ', 'get_ServiceLocator_O6sN0hZService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
        ], [
            'App\\Controller\\ReservasController::actualizaPresupuestoEdita' => '?',
            'App\\Controller\\ReservasController::actualizaPresupuestoGuarda' => '?',
            'App\\Controller\\ReservasController::actualizaReservaEdita' => '?',
            'App\\Controller\\ReservasController::actualizaReservaGuarda' => '?',
            'App\\Controller\\ReservasController::actualizaStockEdita' => '?',
            'App\\Controller\\ReservasController::reservaElimina' => '?',
            'App\\Controller\\ReservasController::stockGuarda' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\ReservasController:actualizaPresupuestoEdita' => '?',
            'App\\Controller\\ReservasController:actualizaPresupuestoGuarda' => '?',
            'App\\Controller\\ReservasController:actualizaReservaEdita' => '?',
            'App\\Controller\\ReservasController:actualizaReservaGuarda' => '?',
            'App\\Controller\\ReservasController:actualizaStockEdita' => '?',
            'App\\Controller\\ReservasController:reservaElimina' => '?',
            'App\\Controller\\ReservasController:stockGuarda' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}
