<?php 

namespace Prestamos\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Prestamos
{

	public $prest_id;
    public $libro_bar_id;
    public $user_id;
	public $fecha_salida;
    public $fecha_devolucion;
    public $estatus;

    protected $inputFilter;

	public function exchangeArray($data)
	{

		$this->prest_id  = (!empty($data['prest_id'])) ? $data['prest_id'] : null;
		$this->libro_bar_id  = (!empty($data['libro_bar_id'])) ? $data['libro_bar_id'] : null;
        $this->user_id  = (!empty($data['user_id'])) ? $data['user_id'] : null;
        $this->fecha_salida  = (!empty($data['fecha_salida'])) ? $data['fecha_salida'] : null;
        $this->fecha_devolucion  = (!empty($data['fecha_devolucion'])) ? $data['fecha_devolucion'] : null;
        $this->estatus  = (!empty($data['estatus'])) ? $data['estatus'] : null;

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
     {/*
         if (!$this->inputFilter) {
             $inputFilter = new InputFilter();

             $inputFilter->add(array(
                 'name'     => 'edit_id',
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
                 'name'     => 'edit_nombre',
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
     }*/

    }

}

 ?>