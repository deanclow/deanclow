<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Wedding;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Session\Config\SessionConfig;
use Zend\Session\Container;
use Zend\Session\SessionManager;

class Module
{
    public function getServiceConfig()
    {    
         return array(
            'factories' => array(
                'Application\Service\BlogComment' => function ($sm) {
                    $service = new \Application\Service\BlogComment($sm);
                    $service->setDb($sm->get('Zend\Db\Adapter\Adapter'));
                    $service->setEncoder(new \Application\Service\Encoder\BlogComment());
                    $service->setModel(new \Application\Model\BlogComment());
                    return $service;
                },
            )
        );   
    }
    
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $sharedEvents = $eventManager->getSharedManager();
        //when we start to add other modules, we can add the different layouts below
        $sharedEvents->attach(__NAMESPACE__, 'dispatch', function($e) {
            /* @var $e \Zend\Mvc\MvcEvent */
            // fired when an ActionController under the namespace is dispatched.
            $controller = $e->getTarget();
            $routeMatch = $e->getRouteMatch();
            /* @var $routeMatch \Zend\Mvc\Router\RouteMatch */
            $routeName = $routeMatch->getMatchedRouteName();
            $controller      = $e->getTarget();
            $controllerClass = get_class($controller);
            $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
            $config          = $e->getApplication()->getServiceManager()->get('config');
            if (isset($config['module_layouts'][$moduleNamespace])) {
                $controller->layout($config['module_layouts'][$moduleNamespace]);
            }
            //$controller->layout('layout/layout');
        }, 100);
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
