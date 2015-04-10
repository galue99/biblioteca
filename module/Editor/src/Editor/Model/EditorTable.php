<?php 

namespace Editor\Model;


 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\ResultSet\ResultSet;

 class EditorTable
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

     public function getEditor($edit_id)
     {
         $edit_id  = (int) $edit_id;
         $rowset = $this->tableGateway->select(array('edit_id' => $edit_id));
         $row = $rowset->current();
       
         return $row;
     }

     public function saveEditor(Editor $editor)
     {
         $data = array(

             'edit_id'  => $editor->edit_id,
             'edit_nombre' => $editor->edit_nombre

         );

         $edit_id = (int) $editor->edit_id;

         if($edit_id == 0){
            throw new \Exception('El ID del Autor no puede ser 0');         
         } 
         else {

                if($this->getEditor($edit_id)!=null)
                {
                    throw new \Exception('Este ID ya esta aosciado a un editor');

                }else{
                       
                        $this->tableGateway->insert($data);

                     }
            }
     }


      public function updateEditor(Editor $editor, $edit_id)
     {
      
         
        $data = array(

             'edit_id'  => $editor->edit_id,
             'edit_nombre' => $editor->edit_nombre

         );

         if ($this->getEditor($edit_id)) {

       
               include "conexion.php";
                        
                        header('Content-Type: text/html; charset=utf-8');

                        mysql_select_db($database_Connection_biblioteca, $Connection_biblioteca);
                        $update_edit= sprintf("UPDATE `biblioteca_db`.`editor` SET 
                                                    `edit_id` = '".$data['edit_id']."',
                                                    `edit_nombre` = '".$data['edit_nombre']."'
                                                    WHERE `editor`.`edit_id` = ".$edit_id.";");
                      
                        $edit_query = mysql_query($update_edit, $Connection_biblioteca) or die(mysql_error());
                        mysql_free_result($edit_query);

         } 
       
     }




     public function deleteEditor($edit_id)
     {
         $this->tableGateway->delete(array('edit_id' => (int) $edit_id));
     }
 }

