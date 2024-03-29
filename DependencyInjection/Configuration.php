<?php

namespace Kunstmaan\RedirectBundle\DependencyInjection;

use Kunstmaan\RedirectBundle\Entity\Redirect;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('kunstmaan_redirect');
        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            // BC layer for symfony/config 4.1 and older
            $rootNode = $treeBuilder->root('kunstmaan_redirect');
        }

        $rootNode
            ->children()
                ->scalarNode('redirect_entity')->defaultValue(Redirect::class)->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
