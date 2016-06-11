<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Model\Category;
use Application\Model\CategoryTable;
use Application\Model\Images;
use Application\Model\ImageTable;
use Application\Model\Products;
use Application\Model\ProductTable;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Authentication\Adapter\DbTable as DbAuthAdapter;
use Zend\Authentication\AuthenticationService;
use Zend\Session\Container;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
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

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Application\Model\ProductTable' =>  function($sm) {
                    $tableGateway = $sm->get('ProductTableGateWay');
                    $table = new ProductTable($tableGateway);
                    return $table;
                },
                'ProductTableGateWay' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Products());
                    return new TableGateway('products', $dbAdapter, null, $resultSetPrototype);
                },
                'Application\Model\CategoryTable' =>  function($sm) {
                    $tableGateway = $sm->get('CategoryTableGateWay');
                    $table = new CategoryTable($tableGateway);
                    return $table;
                },
                'CategoryTableGateWay' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Category());
                    return new TableGateway('categories', $dbAdapter, null, $resultSetPrototype);
                },

                'Application\Model\ImageTable' =>  function($sm) {
                    $tableGateway = $sm->get('ImageTableGateWay');
                    $table = new ImageTable($tableGateway);
                    return $table;
                },
                'ImageTableGateWay' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Images());
                    return new TableGateway('images', $dbAdapter, null, $resultSetPrototype);
                },
                'AuthService' => function ($serviceManager) {
                    $adapter = $serviceManager->get('Zend\Db\Adapter\Adapter');
                    $dbAuthAdapter = new DbAuthAdapter ( $adapter, 'users', 'user_email', 'user_password' );

                    $auth = new AuthenticationService();
                    $auth->setAdapter ( $dbAuthAdapter );
                    return $auth;
                }
            ),
        );
    }


}
