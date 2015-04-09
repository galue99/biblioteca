<?php

namespace Empleados\Form;

 use Zend\Form\Form;

 class EmpleadosForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('empleados');
    

         $this->add(array(
             'name' => 'emp_nombre',
             'type' => 'Text',
         ));

         $this->add(array(
             'name' => 'emp_apellido',
             'type' => 'Text',
         ));

          $this->add(array(
             'name' => 'email',
             'type' => 'email',
         ));

          $this->add(array(
             'name' => 'password',
             'type' => 'password',
         ));

            $this->add(array(
             'name' => 'estatus',
             'type' => 'Zend\Form\Element\Select',
            'options' => array(
                    'empty_option' => 'Estatus',
                    'value_options' =>  $emp_estatus = array('Aministrador' => 'Administrador', 'Visitante' => 'Visitante')
                )
         ));


         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                'class' => 'btn btn-primary btn-md',
                'value' => 'Go',
                'emp_id' => 'submitbutton',
             ),
         ));
     }
 }

