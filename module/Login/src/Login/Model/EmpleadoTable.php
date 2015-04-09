<?php 

namespace Login\Model;


 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\ResultSet\ResultSet;
 use Login\Form\EmpleadosForm;
 use conexion;


 class EmpleadoTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getEmpleado(Empleado $empleado)
     {

        $data = array(

             'email'  => $empleado->email,
             'password' => $empleado->password,

         );

         $rowset = $this->tableGateway->select(array('email' => $data['email'], 'password' => $data['password']));
         $row = $rowset->current();

         if($row){

            return $row;

         }else{

            return null;
         }

         
     }

  
 }

