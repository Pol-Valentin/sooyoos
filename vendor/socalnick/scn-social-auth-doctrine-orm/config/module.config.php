<?php
return array(
    'doctrine' => array(
        'driver' => array(
            'ScnSocialAuth-Entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\XmlDriver',
                'paths' => __DIR__ . '/xml/scnsocialauth'
            ),

            'orm_default' => array(
                'drivers' => array(
                    'ScnSocialAuth\Entity'  => 'ScnSocialAuth-Entity'
                )
            )
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'ScnSocialAuthDoctrineORM-ModuleOptions' => 'ScnSocialAuthDoctrineORM\Service\ModuleOptionsFactory',
            'ScnSocialAuth-UserProviderMapper' => 'ScnSocialAuthDoctrineORM\Service\UserProviderMapperFactory',
        ),
    ),
);
