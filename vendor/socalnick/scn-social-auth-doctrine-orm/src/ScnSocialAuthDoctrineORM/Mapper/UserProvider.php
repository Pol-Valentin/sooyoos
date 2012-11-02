<?php

namespace ScnSocialAuthDoctrineORM\Mapper;

use Doctrine\ORM\EntityManager;
use ScnSocialAuth\Mapper\UserProvider as ScnUserProviderMapper;
use ScnSocialAuthDoctrineORM\Options\ModuleOptions;
use Zend\Stdlib\Hydrator\HydratorInterface;

class UserProvider extends ScnUserProviderMapper
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @var \ScnSocialAuthDoctrineORM\Options\ModuleOptions
     */
    protected $options;

    public function __construct(EntityManager $em, ModuleOptions $options)
    {
        $this->em      = $em;
        $this->options = $options;
    }



    public function insert($entity, $tableName = null, HydratorInterface $hydrator = null)
    {
        return $this->persist($entity);
    }


    protected function persist($entity)
    {
        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }
    
    public function findUserByProviderId($providerId, $provider)
    {
        $er = $this->em->getRepository($this->options->getUserProviderEntityClass());

        $entity = $er->findOneBy(array('provider' => $provider));
        $this->getEventManager()->trigger('find', $this, array('entity' => $entity));

        return $entity;
    }

}