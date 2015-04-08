<?php

namespace Usuarios\Form;

 use Zend\Form\Form;

 class UsuariosForm extends Form
 {  
    

     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('usuarios');


          $this->add(array(
             'name' => 'user_id',
             'type' => 'Text',
             
         ));      

         $this->add(array(
             'name' => 'user_nombre',
             'type' => 'Text',
         )); 

         $this->add(array(
             'name' => 'user_apellido',
             'type' => 'Text',
         ));

         $this->add(array(
            'name' => 'user_cod_tel',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                    'empty_option' => 'Codigo',
                        'value_options' =>  $cod_tel = array('0414' => '0414',
                    '0424' => '0424',
                    '0416' => '0416',
                    '0426' => '0426',
                    '0412' => '0412',
                    '0261' => '0261'
                    )
                )
         ));
         $this->add(array(
             'name' => 'user_tel',
             'type' => 'Text',
         ));
         $this->add(array(
             'name' => 'user_ciudad',
             'type' => 'Text',
         ));
         $this->add(array(
             'name' => 'user_correo',
             'type' => 'Text',
         ));
         $this->add(array(
             'name' => 'user_direccion',
             'type' => 'Text',
         )); 

        $this->add(array(
            'name' => 'user_nacionalidad',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                    'empty_option' => 'Nacionalidad',
                        'value_options' =>  $user_nacionalidad = array('V' => 'V',
                            'E' => 'E'
                    )
                )
         ));

         $this->add(array(
             'name' => 'user_ced',
             'type' => 'Text',
         )); 

         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                'class' => 'btn btn-primary btn-md',
                'value' => 'Go',
                'user_id' => 'submitbutton',
             ),
         ));
     }
 }

