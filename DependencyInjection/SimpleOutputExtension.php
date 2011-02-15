<?php

namespace Equinoxe\SimpleOutputBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Reference;

class SimpleOutputExtension extends Extension
{
    public function configLoad($config, ContainerBuilder $container)
    {
        foreach($config[0] as $format => $class) {
            $container->register('equinoxe.simpleoutput.processor.' . $format, $class);
        }

        //$loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));


        $serviceDefinition = new Definition('Equinoxe\SimpleOutputBundle\Service\SimpleOutput', array(
                'container' => new Reference('service_container', ContainerInterface::EXCEPTION_ON_INVALID_REFERENCE, false)
            )
        );
        $container->setDefinition('equinoxe.simpleoutput', $serviceDefinition);
    }

    public function getXsdValidationBasePath()
    {
        return __DIR__.'/../Resources/config/';
    }

    public function getNamespace()
    {
        return 'http://www.example.com/symfony/schema/';
    }

    public function getAlias()
    {
        return 'simpleoutput';
    }
}
