<?php 

namespace Sanciones\Model;


 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\ResultSet\ResultSet;
 use conexion;


 class SancionesTable
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

     public function getSancion($sanc_id)
     {
         $sanc_id  = (int) $sanc_id;
         $rowset = $this->tableGateway->select(array('sanc_id' => $sanc_id));
         $row = $rowset->current();
         
         return $row;
     }


       public function saveSancion(Sanciones $sanciones)
     {
         $data = array(

             'sanc_id'  => $sanciones->sanc_id,
             'prest_id' => $sanciones->prest_id,
             'user_id' => $sanciones->user_id,
             'user_name' => $sanciones->user_name,
             'sanc_dias' => $sanciones->sanc_dias,
             'sanc_estado' => $sanciones->sanc_estado

         );


         $sanc_id = (int) $sanciones->sanc_id;

         if($sanc_id == 00000){
            throw new \Exception('El ID de sancion no puede ser 00000');
         } 
         else {

                if($this->getSancion($sanc_id)!=null)
                {
                    throw new \Exception('Este ID ya esta asociado a una sanciones');

                }else{
         
                        $this->tableGateway->insert($data);
                     }
            }
     }



    /* public function updateAutor(Autor $autor,$aut_id)
     {
      
         
         $data = array(

             'aut_id'  => $autor->aut_id,
             'aut_nombre' => $autor->aut_nombre

         );

         if ($this->getAutor($aut_id)) {

             /*$this->tableGateway->update($data);
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

     
*/


     public function deleteSancion($sanc_id)
     {
         $this->tableGateway->delete(array('sanc_id' => (int) $sanc_id));
     }
 }

