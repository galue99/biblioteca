<?php 

namespace Empleados\Model;


 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\ResultSet\ResultSet;
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

     public function getEmpleado($emp_id)
     {
         $emp_id  = (int) $emp_id;
         $rowset = $this->tableGateway->select(array('emp_id' => $emp_id));
         $row = $rowset->current();
         
         return $row;
     }


       public function saveEmpleado(Empleado $empleado)
     {
         $data = array(

             'emp_id'  => $empleado->emp_id,
             'emp_nombre'  => $empleado->emp_nombre,
             'emp_apellido'  => $empleado->emp_apellido,
             'email'  => $empleado->email,
             'password'  => $empleado->password,
             'estatus'  => $empleado->estatus

         );

         $emp_id = (int) $empleado->emp_id;

         if($emp_id == 00000){
            throw new \Exception('El ID del Empleado no puede ser 00000');         
         } 
         else {

                if($this->getEmpleado($emp_id)!=null)
                {
                    throw new \Exception('Este ID ya esta asociado a un empleado');

                }else{
         
                        $this->tableGateway->insert($data);
                     }
            }
     }



     public function updateEmpleado(Empleado $empleado,$emp_id)
     {
      
        $data = array(

             'emp_id'  => $empleado->emp_id,
             'emp_nombre'  => $empleado->emp_nombre,
             'emp_apellido'  => $empleado->emp_apellido,
             'email'  => $empleado->email,
             'estatus'  => $empleado->estatus

         );


         if ($this->getEmpleado($emp_id)) {

             /*$this->tableGateway->update($data);*/
               include "conexion.php";
                        
                        header('Content-Type: text/html; charset=utf-8');

                        mysql_select_db($database_Connection_biblioteca, $Connection_biblioteca);
                        $update_emp= sprintf(" UPDATE `biblioteca_db`.`empleado` SET 
                                                    `emp_id` = '".$data['emp_id']."',
                                                    `emp_nombre` = '".$data['emp_nombre']."',
                                                    `emp_apellido` = '".$data['emp_apellido']."',
                                                    `email` = '".$data['email']."',
                                                    `estatus` = '".$data['estatus']."'
                                                    WHERE `empleado`.`emp_id` = ".$emp_id.";");

                        $emp_query = mysql_query($update_emp, $Connection_biblioteca) or die(mysql_error());
                        mysql_free_result($emp_query);

         } 
       
     }

     

     public function deleteEmpleado($emp_id)
     {
         $this->tableGateway->delete(array('emp_id' => (int) $emp_id));
     }
 }

