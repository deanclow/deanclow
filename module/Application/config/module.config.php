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
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'blog-post' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/blog-post',
                    'defaults' => array(
                        'controller' => 'Application\Controller\BlogPost',
                        'action' => 'index'
                    )
                ),
                'child_routes' => array(
                    'index' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/index[/page/:page]',
                            'page' => '[0-9]+',
                            'defaults' => array(
                                'action' => 'index',
                            ),
                            'constraints' => array(
                                'id' => '[0-9]*'
                            ),
                        ),
                        'may_terminate' => true
                    ),
                    'show' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/show/:id',
                            'defaults' => array(
                                'action' => 'show',
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
                    'parse-legacy-data' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/parse-legacy-data',
                            'defaults' => array(
                                'action' => 'parse-legacy-data',
                            ),
                            'constraints' => array(
                                'id' => '[0-9]*'
                            ),
                        ),
                        'may_terminate' => true
                    ),
                )
            ),
            'blog-comment' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/blog-comment',
                    'defaults' => array(
                        'controller' => 'Application\Controller\BlogComment',
                        'action' => 'index'
                    )
                )
            ),
            'chess' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/chessgames',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Chess',
                        'action' => 'index'
                    )
                ),
                'child_routes' => array(
                    'show' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/show[/:id]',
                            'defaults' => array(
                                'action' => 'show',
                            ),
                            'constraints' => array(
                                'id' => '[0-9]*'
                            ),
                        ),
                        'may_terminate' => true
                    ),
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
            'resume' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/resume',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Resume',
                        'action' => 'index'
                    )
                )
            ),
            'about' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/about',
                    'defaults' => array(
                        'controller' => 'Application\Controller\About',
                        'action' => 'index'
                    )
                )
            ),
            'contact' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/contact',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Contact',
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
                    'captcha' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/captcha',
                            'defaults' => array(
                                'action' => 'captcha',
                            ),
                            'constraints' => array(
                                'id' => '[0-9]*'
                            ),
                        ),
                        'may_terminate' => true
                    ),
                )
            ),
            'resume' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/resume',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Resume',
                        'action' => 'index'
                    )
                )
            ),
            'about' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/about',
                    'defaults' => array(
                        'controller' => 'Application\Controller\About',
                        'action' => 'index'
                    )
                )
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
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
            'Application\Controller\Index'          => 'Application\Controller\IndexController',
            'Application\Controller\BlogComment'    => 'Application\Controller\BlogCommentController',
            'Application\Controller\BlogPost'       => 'Application\Controller\BlogPostController',
            'Application\Controller\Chess'          => 'Application\Controller\ChessController',
            'Application\Controller\Resume'         => 'Application\Controller\ResumeController',
            'Application\Controller\About'          => 'Application\Controller\AboutController',
            'Application\Controller\Contact'        => 'Application\Controller\ContactController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml', //'/../view/layout/layout.phtml',
            'layout/index'            => __DIR__ . '/../view/layout/main.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
            'paginator-slide'         => __DIR__ . '/../view/application/blog-post/paginator.phtml',
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
