<?php 

namespace Sanciones\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


class Sanciones implements InputFilterAwareInterface{

	public $sanc_id;
	public $prest_id;
    public $user_id;
    public $user_name;
    public $sanc_dias;
    public $sanc_estado;

	protected $inputFilter;

	public function exchangeArray($data)
	{
       
		$this->sanc_id  = (!empty($data['sanc_id'])) ? $data['sanc_id'] : null;
		$this->prest_id  = (!empty($data['prest_id'])) ? $data['prest_id'] : null;
        $this->user_id  = (!empty($data['user_id'])) ? $data['user_id'] : null;
        $this->user_name  = (!empty($data['user_name'])) ? $data['user_name'] : null;
        $this->sanc_dias  = (!empty($data['sanc_dias'])) ? $data['sanc_dias'] : null;
        $this->sanc_estado = (!empty($data['sanc_estado'])) ? $data['sanc_estado'] : null;

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
     /*    if (!$this->inputFilter) {
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