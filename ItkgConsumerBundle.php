<?php

namespace Itkg\ConsumerBundle;

use Itkg\ConsumerBundle\DependencyInjection\Compiler\ServiceCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ItkgConsumerBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ServiceCompilerPass());
    }
}
