<?php


namespace Empleados;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Empleados\Model\Empleado;
use Empleados\Model\EmpleadoTable;
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
                 'Empleados\Model\EmpleadoTable' =>  function($sm) {
                     $tableGateway = $sm->get('EmpleadoTableGateway');
                     $table = new EmpleadoTable($tableGateway);
                     return $table;
                 },
                 'EmpleadoTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Empleado());
                     return new TableGateway('empleado', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
    }
}
