<?php


namespace App\DependencyInjection\Compiler;

use App\Manager\Export\ExportManager;
use App\Manager\Export\Generator\ExportGeneratorInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ExportGeneratorPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        // always first check if the primary service is defined
        if (!$container->has(ExportManager::class)) {
            return;
        }

        $definition = $container->findDefinition(ExportManager::class);

        // find all service IDs with the app.mail_transport tag
        $taggedServices = $container->findTaggedServiceIds('export.manager');

        foreach ($taggedServices as $id => $tags) {
            // add the transport service to the TransportChain service
            //$definition->addMethodCall('addTransport', [new Reference($id)]);
            $definition->addArgument(new Reference($id));
        }
    }
}