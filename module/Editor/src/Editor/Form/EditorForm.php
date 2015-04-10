<?php

namespace Editor\Form;

 use Zend\Form\Form;

 class EditorForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('editor');


          $this->add(array(
             'name' => 'edit_id',
             'type' => 'Text',
             
         ));      

         $this->add(array(
             'name' => 'edit_nombre',
             'type' => 'Text',
         ));        
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                'class' => 'btn btn-primary btn-md',
                'value' => 'Go',
                'edit_id' => 'submitbutton',
             ),
         ));
     }
 }