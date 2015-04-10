<?php 

namespace Autor\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


class Autor implements InputFilterAwareInterface{

	public $aut_id;
	public $aut_nombre;

	protected $inputFilter;

	public function exchangeArray($data)
	{

       
		$this->aut_id  = (!empty($data['aut_id'])) ? $data['aut_id'] : null;
		$this->aut_nombre  = (!empty($data['aut_nombre'])) ? $data['aut_nombre'] : null;

	}

    public function getArrayCopy()
     {
         return get_object_vars($this);

         /*return array(
            'aut_id' => $this->aut_id,
            'aut_nombre' => $this->aut_nombre
            );*/
     }


	// Add content to these methods:
     public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("No usado");
     }

     public function getInputFilter()
     { 
         if (!$this->inputFilter) {
             $inputFilter = new InputFilter();

             $inputFilter->add(array(
                 'name'     => 'aut_id',
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
                 'name'     => 'aut_nombre',
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

             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
     }

}

 ?>