<?php

namespace Prestamos\Form;

 use Zend\Form\Form;
 use Zend\Db\Sql\Sql;

 class PrestamosForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('editor');


          $this->add(array(
             'name' => 'prest_id',
             'type' => 'Text',
             
         ));

         $this->add(array(
             'name' => 'libro_bar_id',
             'type' => 'Text',
             
         ));    

         $this->add(array(
             'name' => 'user_id',
             'type' => 'Text',
             
         ));    

         $this->add(array(
             'name' => 'fecha_salida',
             'type' => 'Text',
         )); 

         $this->add(array(
             'name' => 'fecha_devolucion',
             'type' => 'Text',             
         )); 
       
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                'class' => 'btn btn-primary btn-md',
                'value' => 'Go',
                'prest_id' => 'submitbutton',
             ),
         ));
     }
 }