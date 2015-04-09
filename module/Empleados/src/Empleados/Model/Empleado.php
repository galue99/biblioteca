<?php 

namespace Empleados\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


class Empleado implements InputFilterAwareInterface{

	public $emp_id;
	public $emp_nombre;
    public $emp_apellido;
    public $email;
    public $password;
    public $estatus;


	protected $inputFilter;

	public function exchangeArray($data)
	{
       
		$this->emp_id  = (!empty($data['emp_id'])) ? $data['emp_id'] : null;
		$this->emp_nombre  = (!empty($data['emp_nombre'])) ? $data['emp_nombre'] : null;
        $this->emp_apellido  = (!empty($data['emp_apellido'])) ? $data['emp_apellido'] : null;
        $this->email  = (!empty($data['email'])) ? $data['email'] : null;
        $this->password  = (!empty($data['password'])) ? $data['password'] : null;
        $this->estatus  = (!empty($data['estatus'])) ? $data['estatus'] : null;

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
         /*if (!$this->inputFilter) {
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
*/
         return $this->inputFilter;
     }

}

 ?>