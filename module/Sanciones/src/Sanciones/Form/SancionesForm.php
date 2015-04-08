<?php

namespace Sanciones\Form;

 use Zend\Form\Form;

 class SancionesForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('sanciones');

          $this->add(array(
             'name' => 'sanc_id',
             'type' => 'Text',
             
         ));      

         $this->add(array(
             'name' => 'prest_id',
             'type' => 'Text',
         )); 

         $this->add(array(
             'name' => 'user_id',
             'type' => 'Text',
         ));

         $this->add(array(
             'name' => 'user_name',
             'type' => 'Text',
         ));

         $this->add(array(
             'name' => 'sanc_dias',
             'type' => 'Text',
         ));

         $this->add(array(
             'name' => 'sanc_estado',
             'type' => 'Zend\Form\Element\Select',
            'options' => array(
                    'empty_option' => 'Estado',
                        'value_options' =>  $sanc_estado = array('Activo' => 'Activo', 'Inactivo' => 'Inactivo'
                    )
                )
         ));


         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                'class' => 'btn btn-primary btn-md',
                'value' => 'Go',
                'sanc_id' => 'submitbutton',
             ),
         ));
     }
 }

