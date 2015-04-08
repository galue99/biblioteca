<?php

namespace Autor\Form;

 use Zend\Form\Form;

 class AutorForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('autor');


          $this->add(array(
             'name' => 'aut_id',
             'type' => 'Text',
             
         ));      

         $this->add(array(
             'name' => 'aut_nombre',
             'type' => 'Text',
         ));        
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                'class' => 'btn btn-primary btn-md',
                'value' => 'Go',
                'aut_id' => 'submitbutton',
             ),
         ));
     }
 }

