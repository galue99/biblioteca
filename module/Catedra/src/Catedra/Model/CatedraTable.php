<?php 

namespace Catedra\Model;


 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\ResultSet\ResultSet;

 class CatedraTable
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

     public function getCatedra($cat_id)
     {
         $cat_id  = (int) $cat_id;
         $rowset = $this->tableGateway->select(array('cat_id' => $cat_id));
         $row = $rowset->current();
        
         return $row;
     }

     public function saveCatedra(Catedra $catedra)
     {
         $data = array(

             'cat_id'  => $catedra->cat_id,
             'cat_nombre' => $catedra->cat_nombre

         );

         $cat_id = (int) $catedra->cat_id;

         if($cat_id == 0){
            throw new \Exception('El ID de esta catedra no puede estar conformado por 0');      
         } 
         else {

                if($this->getCatedra($cat_id)!=null)
                {
                    throw new \Exception('Este ID ya esta asociado a una Catedra');

                }else{
         
                        $this->tableGateway->insert($data);
                     }
            }
     }


      public function updateCatedra(Catedra $catedra, $cat_id)
     {
      
         
        $data = array(

             'cat_id'  => $catedra->cat_id,
             'cat_nombre' => $catedra->cat_nombre

         );

         if ($this->getCatedra($cat_id)) {

       
               include "conexion.php";
                        
                        header('Content-Type: text/html; charset=utf-8');

                        mysql_select_db($database_Connection_biblioteca, $Connection_biblioteca);
                        $update_cat= sprintf("UPDATE `biblioteca_db`.`catedra` SET 
                                                    `cat_id` = '".$data['cat_id']."',
                                                    `cat_nombre` = '".$data['cat_nombre']."'
                                                    WHERE `catedra`.`cat_id` = ".$cat_id.";");
                      
                        $cat_query = mysql_query($update_cat, $Connection_biblioteca) or die(mysql_error());
                        mysql_free_result($cat_query);

         } 
       
     }





     public function deleteCatedra($cat_id)
     {
         $this->tableGateway->delete(array('cat_id' => (int) $cat_id));
     }
 }

