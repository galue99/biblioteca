<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Libro;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Libro\Model\Libro;
use Libro\Model\LibroTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;


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
                 'Libro\Model\LibroTable' =>  function($sm) {
                     $tableGateway = $sm->get('LibroTableGateway');
                     $table = new LibroTable($tableGateway);
                     return $table;
                 },
                 'LibroTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Libro());
                     return new TableGateway('libro', $dbAdapter, null, $resultSetPrototype);
                 },

             ),
         );
    }
}
