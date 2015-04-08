<?php

namespace Busquedas;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;


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
         /*return array(
             'factories' => array(
                 'Autor\Model\AutorTable' =>  function($sm) {
                     $tableGateway = $sm->get('AutorTableGateway');
                     $table = new AutorTable($tableGateway);
                     return $table;
                 },
                 'AutorTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Autor());
                     return new TableGateway('autor', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );*/
    }
}
