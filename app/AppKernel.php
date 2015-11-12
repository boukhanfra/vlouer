<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
        	new FOS\UserBundle\FOSUserBundle(),
            new GsmLot\TraderBundle\GsmLotTraderBundle(),
            new GsmLot\MailBoxBundle\GsmLotMailBoxBundle(),
            new GsmLot\OfferBundle\GsmLotOfferBundle(),
            new GsmLot\SubscriptionBundle\GsmLotSubscriptionBundle(),
            new GsmLot\UserBundle\GsmLotUserBundle(),
            new GsmLot\IndexBundle\GsmLotIndexBundle(),
        	new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
        	new JMS\I18nRoutingBundle\JMSI18nRoutingBundle(),
        	new JMS\TranslationBundle\JMSTranslationBundle(),
        	new PUGX\AutocompleterBundle\PUGXAutocompleterBundle(),
        	new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
        	new WhiteOctober\BreadcrumbsBundle\WhiteOctoberBreadcrumbsBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
