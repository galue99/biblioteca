<?php 

namespace Autor\Model;


 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\ResultSet\ResultSet;
 use conexion;


 class AutorTable
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

     public function getAutor($aut_id)
     {
         $aut_id  = (int) $aut_id;
         $rowset = $this->tableGateway->select(array('aut_id' => $aut_id));
         $row = $rowset->current();
         
         return $row;
     }


       public function saveAutor(Autor $autor)
     {
         $data = array(

             'aut_id'  => $autor->aut_id,
             'aut_nombre' => $autor->aut_nombre

         );

         $aut_id = (int) $autor->aut_id;

         if($aut_id == 00000){
            throw new \Exception('El ID del Autor no puede ser 00000');         
         } 
         else {

                if($this->getAutor($aut_id)!=null)
                {
                    throw new \Exception('Este ID ya esta asociado a un autor');

                }else{
         
                        $this->tableGateway->insert($data);
                     }
            }
     }



     public function updateAutor(Autor $autor,$aut_id)
     {
      
         
         $data = array(

             'aut_id'  => $autor->aut_id,
             'aut_nombre' => $autor->aut_nombre

         );

         if ($this->getAutor($aut_id)) {

             /*$this->tableGateway->update($data);*/
               include "conexion.php";
                        
                        header('Content-Type: text/html; charset=utf-8');

                        mysql_select_db($database_Connection_biblioteca, $Connection_biblioteca);
                        $update_aut= sprintf("  UPDATE `biblioteca_db`.`autor` SET 
                                                    `aut_id` = '".$data['aut_id']."',
                                                    `aut_nombre` = '".$data['aut_nombre']."'
                                                    WHERE `autor`.`aut_id` = ".$aut_id.";");

                        echo $update_aut;

                        $aut_query = mysql_query($update_aut, $Connection_biblioteca) or die(mysql_error());
                        mysql_free_result($libro_query);

         } 
       
     }

     



     public function deleteAutor($aut_id)
     {
         $this->tableGateway->delete(array('aut_id' => (int) $aut_id));
     }
 }

