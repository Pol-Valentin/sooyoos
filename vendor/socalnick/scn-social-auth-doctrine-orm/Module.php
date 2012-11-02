<?php

namespace ScnSocialAuthDoctrineORM;

use Doctrine\ORM\Mapping\Driver\XmlDriver;

class Module
{
    public function onBootstrap($e)
    {
        $app     = $e->getParam('application');
        $sm      = $app->getServiceManager();

        // Add the default entity driver
        $chain = $sm->get('doctrine.driver.orm_default');
        $chain->addDriver(new XmlDriver(__DIR__ . '/config/xml/scnsocialauthdoctrineorm'), 'ScnSocialAuthDoctrineORM\Entity');
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}
