<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Login\Controller\Index' => 'Login\Controller\IndexController'

        ),
    ),
    'router'=>array(
        'routes'=>array(
            'login'=>array(
                'type'=>'Segment',
                'options'=>array(
                    'route' => '/login',
                    'constrains' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),

                    'defaults' => array(
                        'controller' => 'Login\Controller\Index',
                        'action' => 'index'
                    ),
                ),

            ),
        ),
    ),
     'view_manager' => array(
        //'display_not_found_reason' => true,
        //'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        //'not_found_template'       => 'error/404',
        //'exception_template'       => 'error/index',
        /*'template_map' => array(
            
            //'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'login/index/index' => __DIR__ . '/../view/login/index/index.phtml',
            'layout/loginLayout'  => __DIR__ . '/../view/layout/loginLayout.phtml'

           
        ),*/

        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
