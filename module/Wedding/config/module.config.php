<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'index' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/index',
                    'defaults' => array(
                        'controller' => 'Wedding\Controller\Index',
                        'action' => 'index'
                    )
                ),
                'child_routes' => array(
                    'index' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/index',
                            'defaults' => array(
                                'action' => 'index',
                            ),
                            'constraints' => array(
                                'id' => '[0-9]*'
                            ),
                        ),
                        'may_terminate' => true
                    ),
                )
            ),
            'gallery' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/gallery',
                    'defaults' => array(
                        'controller' => 'Wedding\Controller\Gallery',
                        'action' => 'index'
                    )
                ),
                'child_routes' => array(
                    'index' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/index',
                            'defaults' => array(
                                'action' => 'index',
                            ),
                            'constraints' => array(
                                'id' => '[0-9]*'
                            ),
                        ),
                        'may_terminate' => true
                    ),
                )
            ),
            'weddingabout' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/weddingabout',
                    'defaults' => array(
                        'controller' => 'Wedding\Controller\About',
                        'action' => 'index'
                    )
                ),
                'child_routes' => array(
                    'index' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/index',
                            'defaults' => array(
                                'action' => 'index',
                            ),
                            'constraints' => array(
                                'id' => '[0-9]*'
                            ),
                        ),
                        'may_terminate' => true
                    ),
                )
            ),
            'weddingcontact' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/weddingcontact',
                    'defaults' => array(
                        'controller' => 'Wedding\Controller\Contact',
                        'action' => 'index'
                    )
                ),
                'child_routes' => array(
                    'index' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/index',
                            'defaults' => array(
                                'action' => 'index',
                            ),
                            'constraints' => array(
                                'id' => '[0-9]*'
                            ),
                        ),
                        'may_terminate' => true
                    ),
                )
            ),
            'rsvp' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/wedding/rsvp',
                    'defaults' => array(
                        'controller' => 'Wedding\Controller\Rsvp',
                        'action' => 'index'
                    )
                ),
                'child_routes' => array(
                    'index' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/index',
                            'defaults' => array(
                                'action' => 'index',
                            ),
                            'constraints' => array(
                                'id' => '[0-9]*'
                            ),
                        ),
                        'may_terminate' => true
                    ),
                    'add' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/add',
                            'defaults' => array(
                                'action' => 'add',
                            ),
                            'constraints' => array(
                                'id' => '[0-9]*'
                            ),
                        ),
                        'may_terminate' => true
                    ),
                    'edit' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/edit/:id',
                            'defaults' => array(
                                'action' => 'edit',
                            ),
                            'constraints' => array(
                                'id' => '[0-9]*'
                            ),
                        ),
                        'may_terminate' => true
                    ),
                    'delete' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/delete/:id',
                            'defaults' => array(
                                'action' => 'delete',
                            ),
                            'constraints' => array(
                                'id' => '[0-9]*'
                            ),
                        ),
                        'may_terminate' => true
                    ),
                    'rsvp' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/rsvp/:id',
                            'defaults' => array(
                                'action' => 'rsvp',
                            ),
                            'constraints' => array(
                                'id' => '[0-9]*'
                            ),
                        ),
                        'may_terminate' => true
                    ),
                )
            ),
            'registry' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/registry',
                    'defaults' => array(
                        'controller' => 'Wedding\Controller\Registry',
                        'action' => 'index'
                    )
                ),
                'child_routes' => array(
                    'index' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/index',
                            'defaults' => array(
                                'action' => 'index',
                            ),
                            'constraints' => array(
                                'id' => '[0-9]*'
                            ),
                        ),
                        'may_terminate' => true
                    ),
                )
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /wedding/:controller/:action
            'wedding' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/wedding',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Wedding\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Wedding\Controller\Index'     => 'Wedding\Controller\IndexController',
            'Wedding\Controller\Gallery'   => 'Wedding\Controller\GalleryController',
            'Wedding\Controller\About'     => 'Wedding\Controller\AboutController',
            'Wedding\Controller\Contact'   => 'Wedding\Controller\ContactController',
            'Wedding\Controller\Rsvp'      => 'Wedding\Controller\RsvpController',
            'Wedding\Controller\Registry'  => 'Wedding\Controller\RegistryController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            //'layout/layout'            => __DIR__ . '/../view/layout/main.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
