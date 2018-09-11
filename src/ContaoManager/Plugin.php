<?php
/**
 *  Copyright Information
 *
 * @copyright: 2018 agentur fipps e.K.
 * @author   : Arne Borchert
 * @license  : LGPL 3.0+
 */

namespace Fipps\ColorattributeBundle\ContaoManager;

use Fipps\ColorattributeBundle\FippsColorattributeBundle;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Isotope\Isotope;

/**
 * Plugin for the Contao Manager.
 */
class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [BundleConfig::create(FippsColorattributeBundle::class)->setLoadAfter([ContaoCoreBundle::class, 'isotope'])];
    }

    /**
     * {@inheritdoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader, array $config)
    {
        $loader->load('@FippsColorattributeBundle/Resources/config/config.yml');
    }

    /**
     * {@inheritdoc}
     */
    public function getRouteCollection(LoaderResolverInterface $resolver, KernelInterface $kernel)
    {
        $file = '@FippsColorattributeBundle/Resources/config/routing.yml';

        return $resolver->resolve($file)->load($file);
    }

    /**
     * {@inheritdoc}
     */
    public function getPackageDependencies()
    {
        return [];
    }
}