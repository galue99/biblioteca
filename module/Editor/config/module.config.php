<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'controllers' => array(
        'invokables' => array(
            'Editor\Controller\Index' => 'Editor\Controller\IndexController'

        ),
    ),
    'router'=>array(
        'routes'=>array(
            'editor'=>array(
                'type'=>'Segment',
                'options'=>array(
                    'route' => '/editor[/[:action][/:id]]',
                    'constrains' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),

                    'defaults' => array(
                        'controller' => 'Editor\Controller\Index',
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
