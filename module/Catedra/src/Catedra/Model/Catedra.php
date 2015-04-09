<?php 

namespace Catedra\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Catedra{

	public $cat_id;
	public $cat_nombre;

	public function exchangeArray($data)
	{

		$this->cat_id  = (!empty($data['cat_id'])) ? $data['cat_id'] : null;
		$this->cat_nombre  = (!empty($data['cat_nombre'])) ? $data['cat_nombre'] : null;

	}

    public function getArrayCopy()
     {
         return get_object_vars($this);

         
     }


	 public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("No usado");
     }

      public function getInputFilter()
     {
         if (!$this->inputFilter) {
             $inputFilter = new InputFilter();

             $inputFilter->add(array(
                 'name'     => 'cat_id',
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
                 'name'     => 'cat_nombre',
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