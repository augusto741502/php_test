<?php

namespace ContainerV6EWzyg;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getContainer_EnvVarProcessorService extends App_KernelProdContainer
{
    /*
     * Gets the private 'container.env_var_processor' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\EnvVarProcessor
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['container.env_var_processor'] = new \Symfony\Component\DependencyInjection\EnvVarProcessor($container, new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['secrets.vault'] ?? $container->load('getSecrets_VaultService'));
        }, 1));
    }
}
