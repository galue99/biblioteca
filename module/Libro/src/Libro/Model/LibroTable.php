<?php

namespace Libro\Model;


 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\ResultSet\ResultSet;
 use Zend\Db\Sql\Select;
 use Zend\Paginator\Adapter\DbSelect;
 use Zend\Paginator\Paginator;

 class LibroTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
        $this->tableGateway = $tableGateway;
     }

     public function fetchAll($paginated=false)
     {
            if ($paginated) {
         
             $select = new Select('libro');
            
             $resultSetPrototype = new ResultSet();
             $resultSetPrototype->setArrayObjectPrototype(new Libro());
            
             $paginatorAdapter = new DbSelect(
                
                 $select,
                
                 $this->tableGateway->getAdapter(),
                 
                 $resultSetPrototype
             );
             
             $paginator = new Paginator($paginatorAdapter);
             return $paginator;
         }

         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getLibro($libro_bar_id)
     {
         $libro_bar_id  = (int) $libro_bar_id;
         $rowset = $this->tableGateway->select(array('libro_bar_id' => $libro_bar_id));
         $row = $rowset->current();
        
         return $row;
     }

     public function saveLibro(Libro $libro)
     {
         $data = array(

             'libro_bar_id'  => $libro->libro_bar_id,
             'libro_id'  => $libro->libro_id,
             'libro_nombre' => $libro->libro_nombre,
             'aut_nombre'  => $libro->aut_nombre,
             'edit_nombre'  => $libro->edit_nombre,
             'catedra_nombre'  => $libro->catedra_nombre,
             'fecha_creacion'  => $libro->fecha_creacion,
             'cantidad'  => $libro->cantidad,
             'image_path' => $libro->image_path,
             'resena' => $libro->resena,
             
         );

          $libro_bar_id = (int) $libro->libro_bar_id;
          echo $libro_bar_id;


         if($libro_bar_id  == 0){
            throw new \Exception('El codigo de barra del libro no puede ser 0');         
         } 
         else {

                if($this->getLibro($libro_bar_id)!=null)
                {
                    throw new \Exception('Este codigo ya esta asociado a un libro: '.$libro_bar_id);

                }else{
                        
                        /*$this->tableGateway->insert(array_values($data));*/


                        include "conexion.php";
                        header('Content-Type: text/html; charset=utf-8');

                        mysql_select_db($database_Connection_biblioteca, $Connection_biblioteca);
                        $insert_libro = sprintf("INSERT INTO `biblioteca_db`.`libro` (
                                                                `libro_bar_id` ,
                                                                `libro_id` ,
                                                                `libro_nombre` ,
                                                                `aut_nombre` ,
                                                                `edit_nombre` ,
                                                                `catedra_nombre` ,
                                                                `fecha_creacion` ,
                                                                `cantidad` ,
                                                                `image_path` ,
                                                                `resena`
                                                                ) VALUES (
                                                                ".$data['libro_bar_id'].",
                                                                '".$data['libro_id']."',
                                                                '".$data['libro_nombre']."',
                                                                '".$data['aut_nombre']."',
                                                                '".$data['edit_nombre']."',
                                                                '".$data['catedra_nombre']."',
                                                                '".$data['fecha_creacion']."',
                                                                ".$data['cantidad'].",
                                                                '".$data['image_path']."',
                                                                '".$data['resena']."');");

                        $libro_query = mysql_query($insert_libro, $Connection_biblioteca) or die(mysql_error());
                        mysql_free_result($libro_query);

                     }

            }

     }




      public function updateLibro(Libro $libro, $libro_bar_id)
     {
      

         
        $data = array(

             'libro_bar_id'  => $libro->libro_bar_id,
             'libro_id'  => $libro->libro_id,
             'libro_nombre' => $libro->libro_nombre,
             'aut_nombre'  => $libro->aut_nombre,
             'edit_nombre'  => $libro->edit_nombre,
             'catedra_nombre'  => $libro->catedra_nombre,
             'fecha_creacion'  => $libro->fecha_creacion,
             'cantidad'  => $libro->cantidad,
             'image_path' => $libro->image_path,
             'resena' => $libro->resena,
                    
         );

         if ($this->getLibro($libro_bar_id)) {

       
               include "conexion.php";
                        
                        header('Content-Type: text/html; charset=utf-8');

                        mysql_select_db($database_Connection_biblioteca, $Connection_biblioteca);
                        $update_libro= sprintf("UPDATE `biblioteca_db`.`libro` SET 
                                                                `libro_bar_id` = '".$data['libro_bar_id']."',
                                                                `libro_id` = '".$data['libro_id']."',
                                                                `libro_nombre` = '".$data['libro_nombre']."',
                                                                `aut_nombre` = '".$data['aut_nombre']."',
                                                                `edit_nombre` = '".$data['edit_nombre']."',
                                                                `catedra_nombre` = '".$data['catedra_nombre']."',
                                                                `fecha_creacion` = '".$data['fecha_creacion']."',
                                                                `cantidad` = ".$data['cantidad'].",
                                                                `image_path` = '".$data['image_path']."',
                                                                `resena` = '".$data['resena']."'
                                                    WHERE `libro`.`libro_bar_id` = ".$libro_bar_id.";");
                    
                      
                        $edit_query = mysql_query($update_libro, $Connection_biblioteca) or die(mysql_error());
                        mysql_free_result($edit_query);

                        
         } 
       
     }



     public function deleteLibro($libro_bar_id)
     {
         $this->tableGateway->delete(array('libro_bar_id' => (int) $libro_bar_id));
     }
 }

