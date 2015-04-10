<?php


namespace Prestamos;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Prestamos\Model\Prestamos;
use Prestamos\Model\PrestamosTable;
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
                 'prestamos\Model\PrestamosTable' =>  function($sm) {
                     $tableGateway = $sm->get('PrestamosTableGateway');
                     $table = new PrestamosTable($tableGateway);
                     return $table;
                 },
                 'PrestamosTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Prestamos());
                     return new TableGateway('Prestamos', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
    }
}
