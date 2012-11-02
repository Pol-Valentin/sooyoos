<?php
/**
 * ScnSocialAuth Module
 *
 * @category   ScnSocialAuth
 * @package    ScnSocialAuth_Service
 */

namespace ScnSocialAuthDoctrineORM\Service;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use ScnSocialAuthDoctrineORM\Mapper\UserProvider;


/**
 * @category   ScnSocialAuth
 * @package    ScnSocialAuth_Service
 */
class UserProviderMapperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        $options = $services->get('scnsocialauthdoctrineorm_module_options');
        
        $entityClass = $options->getUserProviderEntityClass();
        
        $mapper = new UserProvider($services->get('zfcuser_doctrine_em'), $options);
        $mapper->setEntityPrototype(new $entityClass);

        return $mapper;
    }
}