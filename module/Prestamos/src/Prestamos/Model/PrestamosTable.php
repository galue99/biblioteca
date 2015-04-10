<?php 

namespace Prestamos\Model;


 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\ResultSet\ResultSet;
 use libro\Model\LibroTable;

 class PrestamosTable
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

     public function getPrestamo($prest_id)
     {
         $prest_id  = (int) $prest_id;
         $rowset = $this->tableGateway->select(array('prest_id' => $prest_id));
         $row = $rowset->current();
       
         return $row;
     }

     public function getLibro($libro_bar_id)
     {
          include "conexion.php";
                        
                        header('Content-Type: text/html; charset=utf-8');

                        mysql_select_db($database_Connection_biblioteca, $Connection_biblioteca);
                        $update_prest= sprintf("SELECT * fROM  `biblioteca_db`.`libro` 
                                                WHERE `libro`.`libro_bar_id` = '".$libro_bar_id."'" );
                      
                        $prest_query = mysql_query($update_prest, $Connection_biblioteca) or die(mysql_error());
                        $row_query = mysql_fetch_assoc($prest_query);
                        mysql_free_result($prest_query);
                       
       
         return $row_query;
     }

     public function getUser($user_id)
     {
         $user_id  = (int) $user_id;
         $rowset = $this->tableGateway->select(array('user_id' => $user_id));
         $row = $rowset->current();
       
         return $row;
     }

     public function savePrestamo(Prestamos $prestamos)
     {
        $date=date_create($prestamos->fecha_salida);
        date_add($date,date_interval_create_from_date_string("05 days"));
        $fecha_devolucion = date_format($date,"Y-m-d");

         $data = array(

             'prest_id'  => $prestamos->prest_id,
             'libro_bar_id'  => $prestamos->libro_bar_id,
             'user_id'  => $prestamos->user_id,
             'fecha_salida'  => $prestamos->fecha_salida,
             'fecha_devolucion'  => $fecha_devolucion,
             'estatus' => 'No procesado'

         );

         $prest_id = (int) $prestamos->prest_id;

         if($prest_id == 00000){
            throw new \Exception('El ID del Autor no puede ser 0');
         }
         else {

                if($this->getPrestamo($prest_id)!=null)
                {
                    throw new \Exception('Este ID ya esta asociado a un prestamo');

                }else{

                    if($this->getLibro($data['libro_bar_id'])!=null)
                    {
                            if($this->getUser($data['user_id'])!=null){

                            
                                $this->tableGateway->insert($data);

                                include "conexion.php";

                                 header('Content-Type: text/html; charset=utf-8');

                                    mysql_select_db($database_Connection_biblioteca, $Connection_biblioteca);
                                    
                                    $update_libro= sprintf("UPDATE `biblioteca_db`.`libro` SET 
                                                                `cantidad` = `cantidad`-1
                                                                WHERE `libro`.`libro_bar_id` = ".$data['libro_bar_id'].";");
                                                                     
                                    $libro_query = mysql_query($update_libro, $Connection_biblioteca) or die(mysql_error());
                                    mysql_free_result($libro_query);

                            }else{

                                throw new \Exception('El ID del usuario no existe, recarga la pagina o vuelve a la pagina anterior');

                            }
                              
                    }else{

                           throw new \Exception('El ID del libro no existe, recarga la pagina o vuelve a la pagina anterior');
                        }
                       
                     }
            }
     }


      public function updatePrestamos(Prestamos $prestamos, $prest_id)
     {
      
         
        $data = array(

             'prest_id'  => $prestamos->prest_id,
             'libro_bar_id'  => $prestamos->libro_bar_id,
             'user_id'  => $prestamos->user_id,
             'fecha_salida'  => $prestamos->fecha_salida,
             'fecha_devolucion'  => $prestamos->fecha_devolucion,
             'estatus' => $prestamos->estatus

         );

        if($this->getLibro($data['libro_bar_id'])){

            if ($this->getUser($data['user_id'])) {
                # code...
            

            if ($this->getPrestamo($prest_id)) {

       
               include "conexion.php";
                        
                        header('Content-Type: text/html; charset=utf-8');

                        mysql_select_db($database_Connection_biblioteca, $Connection_biblioteca);
                        $update_prest= sprintf("UPDATE `biblioteca_db`.`prestamos` SET 
                                                    `prest_id` = '".$data['prest_id']."',
                                                    `libro_bar_id` = '".$data['libro_bar_id']."',
                                                    `user_id` = '".$data['user_id']."',
                                                    `fecha_salida` = '".$data['fecha_salida']."',
                                                    `fecha_devolucion` = '".$data['fecha_devolucion']."'
                                                    WHERE `prestamos`.`prest_id` = ".$prest_id.";");
                      
                        $prest_query = mysql_query($update_prest, $Connection_biblioteca) or die(mysql_error());
                        mysql_free_result($prest_query);

         }

            }else{

            throw new \Exception('El ID del usuario no existe, recarga la pagina o vuelve a la pagina anterior');
            }

        }else{
            throw new \Exception('El ID del libro no existe, recarga la pagina o vuelve a la pagina anterior');
        }
  
       
     }


     public function deletePrestamo($prest_id)
     {
         $this->tableGateway->delete(array('prest_id' => (int) $prest_id));
     }



     public function saveDevolucion(Prestamos $prestamos)
     {
        
         $data = array(

             'prest_id'  => $prestamos->prest_id,
             'user_id' => $prestamos->user_id,
             'fecha_devolucion' => $prestamos->fecha_devolucion

         );

         $prest_id = (int) $prestamos->prest_id;
         $prestamo_db = $this->getPrestamo($prest_id);
         /*$libro = $this->getLibro($prestamo_db->libro_bar_id);*/

          /*if($libro->cantidad!=null){

          }else{

             throw new \Exception('El ID del préstamo n0'.print_r($libro));
          }*/

         /*$cantidad = $libro->cantidad;*/

         if($prest_id == 00000){
            throw new \Exception('El ID del préstamo no puede ser 00000');
         }
         else {

                if($prestamo_db!=null)
                {
                      if($prestamo_db->libro_bar_id!=null)
                    {
                            if($prestamo_db->user_id!=null)
                            {
                                        include "conexion.php";

                                if ($prestamo_db->fecha_devolucion == $data['fecha_devolucion']) 
                                {
                                    
                                    header('Content-Type: text/html; charset=utf-8');

                                    mysql_select_db($database_Connection_biblioteca, $Connection_biblioteca);
                                    $update_prest= sprintf("UPDATE `biblioteca_db`.`prestamos` SET 
                                                                `estatus` = 'procesado'
                                                                WHERE `prestamos`.`prest_id` = ".$prest_id.";");

                                    $update_libro= sprintf("UPDATE `biblioteca_db`.`libro` SET 
                                                                `cantidad` = `cantidad`+1
                                                                WHERE `libro`.`libro_bar_id` = ".$prestamo_db->libro_bar_id.";");
                                  
                                    $prest_query = mysql_query($update_prest, $Connection_biblioteca) or die(mysql_error());
                                    $libro_query = mysql_query($update_libro, $Connection_biblioteca) or die(mysql_error());
                                    mysql_free_result($prest_query);
                                    mysql_free_result($libro_query);
                                
                                }else{


                                     header('Content-Type: text/html; charset=utf-8');

                                    mysql_select_db($database_Connection_biblioteca, $Connection_biblioteca);
                                    $insert_sanc= sprintf("INSERT INTO `biblioteca_db`.`sanciones` (`prest_id`,
                                                                                                    `user_id`, 
                                                                                                    `sanc_dias`, 
                                                                                                    `sanc_estado`)
                                                                VALUES ('".$data['user_id']."', '".$data['prest_id']."', '3', 'activo');");

                                    $insert_sanc = mysql_query($insert_sanc, $Connection_biblioteca) or die(mysql_error());
                                    mysql_free_result($insert_sanc);

                                }


                            }else{

                                throw new \Exception('El ID del usuario no existe, recarga la pagina o vuelve a la pagina anterior');

                            }
                              
                    }else{

                           throw new \Exception('El ID del libro no existe, recarga la pagina o vuelve a la pagina anterior');
                        }

                }else{


                    throw new \Exception('La devolución no puede efectuarse debido a que el préstamo no existe, volver a la página anterior');

                       
                     }
            }
     }


    /* public function prestamoReport(Prestamos $prestamos)
     {
        
        $resultSet = $this->tableGateway->select();
        return $resultSet;
     }*/



 }

