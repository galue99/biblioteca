<?php

namespace Catedra\Form;

 use Zend\Form\Form;

 class CatedraForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('catedra');


          $this->add(array(
             'name' => 'cat_id',
             'type' => 'Text',
             
         ));      

         $this->add(array(
             'name' => 'cat_nombre',
             'type' => 'Text',
         ));        
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                'class' => 'btn btn-primary btn-md',
                'value' => 'Go',
                'cat_id' => 'submitbutton',
             ),
         ));
     }
 }