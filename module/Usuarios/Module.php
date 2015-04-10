<?php

namespace Usuarios;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Usuarios\Model\Usuarios;
use Usuarios\Model\UsuariosTable;
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
                 'Usuarios\Model\UsuariosTable' =>  function($sm) {
                     $tableGateway = $sm->get('UsuariosTableGateway');
                     $table = new UsuariosTable($tableGateway);
                     return $table;
                 },
                 'UsuariosTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Usuarios());
                     return new TableGateway('Usuarios', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
    }
}
