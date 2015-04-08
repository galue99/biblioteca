<?php 

namespace Usuarios\Model;


 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\ResultSet\ResultSet;
 use conexion;


 class UsuariosTable
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

     public function getUsuarios($user_id)
     {
         $user_id  = (int) $user_id;
         $rowset = $this->tableGateway->select(array('user_id' => $user_id));
         $row = $rowset->current();
         
         return $row;
     }


       public function saveUsuarios(Usuarios $usuarios)
     {
         $data = array(

             'user_id'  => $usuarios->user_id,
             'user_nombre'  => $usuarios->user_nombre,
             'user_apellido'  => $usuarios->user_apellido,
             'user_cod_tel'  => $usuarios->user_cod_tel,
             'user_tel'  => $usuarios->user_tel,
             'user_ciudad'  => $usuarios->user_ciudad,
             'user_correo'  => $usuarios->user_correo,
             'user_direccion'  => $usuarios->user_direccion,
             'user_nacionalidad'  => $usuarios->user_nacionalidad,
             'user_ced'  => $usuarios->user_ced
         );

         $user_id = (int) $usuarios->user_id;

         if($user_id == 00000){
            throw new \Exception('El ID del Usuario no puede ser 00000');
         } 
         else {

                if($this->getUsuarios($user_id)!=null)
                {
                    throw new \Exception('Este ID ya esta asociado a un usuario');

                }else{
         
                        $this->tableGateway->insert($data);
                     }
            }
     }



     public function updateUsuarios(Usuarios $usuarios,$user_id)
     {
      
         
         $data = array(

             'user_id'  => $usuarios->user_id,
             'user_nombre'  => $usuarios->user_nombre,
             'user_apellido'  => $usuarios->user_apellido,
             'user_cod_tel'  => $usuarios->user_cod_tel,
             'user_tel'  => $usuarios->user_tel,
             'user_ciudad'  => $usuarios->user_ciudad,
             'user_correo'  => $usuarios->user_correo,
             'user_direccion'  => $usuarios->user_direccion,
             'user_nacionalidad'  => $usuarios->user_nacionalidad,
             'user_ced'  => $usuarios->user_ced
         );

         if ($this->getUsuarios($user_id)) {

             /*$this->tableGateway->update($data);*/
               include "conexion.php";
                        
                        header('Content-Type: text/html; charset=utf-8');

                        mysql_select_db($database_Connection_biblioteca, $Connection_biblioteca);
                        $update_user= sprintf("  UPDATE `biblioteca_db`.`usuarios` SET 
                                                    `user_id` = '".$data['user_id']."',
                                                    `user_nombre` = '".$data['user_nombre']."',
                                                    `user_apellido` = '".$data['user_apellido']."',
                                                    `user_cod_tel` = '".$data['user_cod_tel']."',
                                                    `user_tel` = '".$data['user_tel']."',
                                                    `user_ciudad` = '".$data['user_ciudad']."',
                                                    `user_correo` = '".$data['user_correo']."',
                                                    `user_direccion` = '".$data['user_direccion']."',
                                                    `user_nacionalidad` = '".$data['user_nacionalidad']."',
                                                    `user_ced` = '".$data['user_ced']."'
                                                    WHERE `usuarios`.`user_id` = ".$user_id.";");


                        $user_query = mysql_query($update_user, $Connection_biblioteca) or die(mysql_error());
                        mysql_free_result($user_query);

         } 
       
     }

     



     public function deleteUsuarios($user_id)
     {
         $this->tableGateway->delete(array('user_id' => (int) $user_id));
     }
 }

