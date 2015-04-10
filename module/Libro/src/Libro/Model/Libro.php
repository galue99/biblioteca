<?php

namespace Libro\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\Regex as RegexValidator;
use Zend\Validator\ValidatorInterface;

class Libro implements InputFilterAwareInterface
 {
     public $libro_bar_id;
     public $libro_id;
     public $libro_nombre;
     public $aut_nombre;
     public $edit_nombre;
     public $catedra_nombre;
     public $fecha_creacion;
     public $cantidad;
     public $image_path;
     public $resena;

     protected $validator;
     protected $inputFilter;

     public function exchangeArray($data)
     {
         $this->libro_bar_id = (!empty($data['libro_bar_id'])) ? $data['libro_bar_id'] : 12;

         $this->libro_id     = (!empty($data['libro_id'])) ? $data['libro_id'] : null;

         $this->libro_nombre = (!empty($data['libro_nombre'])) ? $data['libro_nombre'] : null;

         $this->aut_nombre  = (!empty($data['aut_nombre'])) ? $data['aut_nombre'] : null;

         $this->edit_nombre  = (!empty($data['edit_nombre'])) ? $data['edit_nombre'] : null;

         $this->catedra_nombre  = (!empty($data['catedra_nombre'])) ? $data['catedra_nombre'] : null;

         $this->fecha_creacion  = (!empty($data['fecha_creacion'])) ? $data['fecha_creacion'] : null;

         $this->cantidad  = (!empty($data['cantidad'])) ? $data['cantidad'] : null;

         $this->image_path = (!empty($data['image_path'])) ? $data['image_path'] : null;

         $this->resena = (!empty($data['resena'])) ? $data['resena'] : null;

     }

     public function getArrayCopy()
     {
         return get_object_vars($this);
         
     }

      public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("No usado");
     }

     
     
     /*protected function getValidator()
     {
         if (null === $this->validator) {
             $this->validator = new RegexValidator('/^[0-9]+$/');
         }
         return $this->validator;
     }*/

     public function getInputFilter()
     {
         if (!$this->inputFilter) {

             $inputFilter = new InputFilter();

             $inputFilter->add(array(
                 'name'     => 'libro_bar_id',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 12,
                         ),
                     ),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'libro_id',
                 'required' => true,
                 /*'filters'  => array(
                     array('name' => 'StringTrim'),
                 ),*/
                 /*'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 12,
                         ),
                     ),
                 ),*/
             ));

             $inputFilter->add(array(
                 'name'     => 'libro_nombre',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 125,
                         ),
                     ),
                 ),
             ));

              $inputFilter->add(array(
                'name'     => 'aut_nombre',
               
               /* 'validators' => array(
                     array(
                         'options' => array(
                             'encoding' => 'UTF-8',
                         ),
                     ),
                 ),*/
                /*'options' => array(
            'disable_inarray_validator' => false
        ),*/
                
             )); 

              $inputFilter->add(array(
                 'name'     => 'edit_nombre',
                
                 
             ));

              $inputFilter->add(array(
                 'name'     => 'catedra_nombre',
               
                 
             ));

              $inputFilter->add(array(
                 'name'     => 'fecha_creacion',
                
                 
             ));

              $inputFilter->add(array(
                 'name'     => 'cantidad',
                 'required' => true,
                 /*'filters'  => array(
                     array('name' => 'Int'),
                 ),*/
                 /*'validators' => array(
                    $this->getValidator()
                 ),*/
             ));

               $inputFilter->add(array(
                 'name'     => 'image_path',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 125,
                         ),
                     ),
                 ),
             )); 

              $inputFilter->add(array(
                 'name'     => 'resena',
                 'required' => true,
                 /*'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),*/
                
             ));           

           

             $this->inputFilter = $inputFilter;

         }

         return $this->inputFilter;
     }


      
 }


 ?>