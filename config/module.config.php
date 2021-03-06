<?php
return array(
    'di' => array(
        'instance' => array(
            'alias' => array(
                'hyperion' => 'Hyperion\Controller\IndexController',
                'domains' => 'Hyperion\Dns\Controller\DomainsController',
            ),
            'Zend\View\Resolver\TemplatePathStack' => array(
                'parameters' => array(
                    'paths'  => array(
                        'hyperion' => __DIR__ . '/../views',
                        'domains' => __DIR__ . '/../views',
                    ),
                ),
            ),
            'Hyperion\Controller\ControllerAbstract' => array(
                'parameters' => array(
                    'ApiConfig' => array(
                        'User' => 'enteryourusername',
                        'Key' => 'enteryourkeyhere',
                        'CustomerId' => 'enteryourcustomeridhere',
                    
                        'Auth' =>array( 
                            'Url' =>  'https://lon.identity.api.rackspacecloud.com',
                            'Ver' => 'v1.1',
                        ),
                    
                        'Dns' =>array(
                            'Url' => 'https://lon.dns.api.rackspacecloud.com',
                            'Ver' => 'v1.0',
                        ),   
                    ),
                ),
            ),
        
            // Setup the router and routes
            'Zend\Mvc\Router\RouteStackInterface' => array(
                'parameters' => array(
                    'routes' => array(
                        'hyperion' => array(
                            'type'    => 'Zend\Mvc\Router\Http\Segment',
                            'options' => array(
                                'route'    => '/hyperion[/:controller[/:action]]',
                                'constraints' => array(
                                    'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                ),
                                'defaults' => array(
                                    'controller' => 'hyperion',
                                    'action'     => 'index',
                                ),
                            ),
                            'may_terminate' => true,
                            'child_routes'  => array(
                                'query' => array(
                                    'type' => 'Query',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        
        
        ),
    ),
);
