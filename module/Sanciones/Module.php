<?php


namespace Sanciones;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Sanciones\Model\Sanciones;
use Sanciones\Model\SancionesTable;
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
                 'Sanciones\Model\SancionesTable' =>  function($sm) {
                     $tableGateway = $sm->get('SancionesTableGateway');
                     $table = new SancionesTable($tableGateway);
                     return $table;
                 },
                 'SancionesTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Sanciones());
                     return new TableGateway('sanciones', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
    }
}
