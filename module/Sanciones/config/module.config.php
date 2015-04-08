<?php


return array(
    'controllers' => array(
        'invokables' => array(
            'Sanciones\Controller\Index' => 'Sanciones\Controller\IndexController'

        ),
    ),
    'router'=>array(
        'routes'=>array(
            'sanciones'=>array(
                'type'=>'Segment',
                'options'=>array(
                    'route' => '/sanciones[/[:action][/:id]]',
                    'constrains' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),

                    'defaults' => array(
                        'controller' => 'sanciones\Controller\Index',
                        'action' => 'index'
                    ),
                ),
            ),
        ),
    ),
     'view_manager' => array(
        /*'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'libro/index/index' => __DIR__ . '/../view/libro/index/index.phtml',

           
        ),*/

        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
