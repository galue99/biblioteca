<?php 

namespace Usuarios\Model;

/*use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;*/


class Usuarios {

	public $user_id;
	public $user_nombre;
    public $user_apellido;
    public $user_cod_tel;
    public $user_tel;
    public $user_ciudad;
    public $user_correo;
    public $user_direccion;
    public $user_nacionalidad;
    public $user_ced;


	protected $inputFilter;

	public function exchangeArray($data)
	{

       
		$this->user_id  = (!empty($data['user_id'])) ? $data['user_id'] : null;
		$this->user_nombre  = (!empty($data['user_nombre'])) ? $data['user_nombre'] : null;
        $this->user_apellido  = (!empty($data['user_apellido'])) ? $data['user_apellido'] : null;
        $this->user_tel  = (!empty($data['user_tel'])) ? $data['user_tel'] : null;
        $this->user_cod_tel  = (!empty($data['user_cod_tel'])) ? $data['user_cod_tel'] : null;
        $this->user_ciudad = (!empty($data['user_ciudad'])) ? $data['user_ciudad'] : null;
        $this->user_correo  = (!empty($data['user_correo'])) ? $data['user_correo'] : null;
        $this->user_direccion  = (!empty($data['user_direccion'])) ? $data['user_direccion'] : null; 
        $this->user_nacionalidad  = (!empty($data['user_nacionalidad'])) ? $data['user_nacionalidad'] : null;               
        $this->user_ced  = (!empty($data['user_ced'])) ? $data['user_ced'] : null;

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
    /* public function setInputFilter(InputFilterInterface $inputFilter)
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

         return $this->inputFilter;
     }*/

}

 ?>