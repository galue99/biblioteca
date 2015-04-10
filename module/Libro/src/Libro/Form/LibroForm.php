<?php

namespace Libro\Form;

use Zend\Form\Form;
use Zend\Db\Sql\Sql;


 class LibroForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
       
        parent::__construct('libro');
        


        $this->add(array(
            'name' => 'libro_bar_id',
            'type' => 'Text',
            
        ));   

        $this->add(array(
            'name' => 'libro_id',
            'type' => 'Text',             
        ));   

        $this->add(array(
            'name' => 'libro_nombre',
            'type' => 'Text',
        ));

        $this->add(array(
            'name' => 'aut_nombre',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                    'empty_option' => 'Elige un autor',
                        'value_options' => $this->getOptionsForAutorSelect(),
                )
         ));

        $this->add(array(
            'name' => 'edit_nombre',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                    'empty_option' => 'Elige un editor',
                        'value_options' => $this->getOptionsForEditorSelect(),
                )
        ));

        $this->add(array(
            'name' => 'catedra_nombre',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                    'empty_option' => 'Elige una catedra',
                        'value_options' => $this->getOptionsForCatedraSelect(),

                )
         ));

        $this->add(array(
            'name' => 'fecha_creacion',
            /*'type' => 'Zend\Form\Element\Date',*/
            'type' => 'Text'
        ));

        $this->add(array(
             'name' => 'cantidad',
             'type' => 'Text',
         ));


        $this->add(array(
             'name' => 'image_path',
             'type' => 'Text',
         ));
        
        $this->add(array(
             'name' => 'resena',
             'type' => 'Textarea',
         ));


         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                'class' => 'btn btn-primary btn-md',
                'value' => 'Guardar Cambios',
                'libro_id' => 'submitbutton',
             ),
         ));
     }

    public function getOptionsForAutorSelect()
    {

        include "conexion.php";

        mysql_select_db($database_Connection_biblioteca, $Connection_biblioteca);
        $query_autor = "SELECT * FROM autor ORDER BY autor.aut_id";

        $autor= mysql_query($query_autor, $Connection_biblioteca) or die(mysql_error());
        $row_autor= mysql_fetch_assoc($autor);

        $select_autor = array();

        do{

            $select_autor[$row_autor['aut_nombre']] = $row_autor['aut_nombre'];
                
                
            } while (($row_autor = mysql_fetch_assoc($autor)) ); 

        return $select_autor;
    }


    public function getOptionsForEditorSelect()
    {

        include "conexion.php";

        mysql_select_db($database_Connection_biblioteca, $Connection_biblioteca);
        $query_editor = "SELECT * FROM editor ORDER BY editor.edit_id";

        $editor= mysql_query($query_editor, $Connection_biblioteca) or die(mysql_error());
        $row_editor= mysql_fetch_assoc($editor);

        $select_editor = array();

        do{

            $select_editor[$row_editor['edit_nombre']] = $row_editor['edit_nombre'];
                
                
            } while (($row_editor = mysql_fetch_assoc($editor))); 

        return $select_editor;
    }



    public function getOptionsForCatedraSelect()
    {

        include "conexion.php";

        mysql_select_db($database_Connection_biblioteca, $Connection_biblioteca);
        $query_catedra = "SELECT * FROM catedra ORDER BY catedra.cat_id";

        $catedra= mysql_query($query_catedra, $Connection_biblioteca) or die(mysql_error());
        $row_catedra= mysql_fetch_assoc($catedra);

        $select_catedra = array();

        do{

            $select_catedra[$row_catedra['cat_nombre']] = $row_catedra['cat_nombre'];
                
                
            } while (($row_catedra = mysql_fetch_assoc($catedra))); 

        return $select_catedra;
    }
   
 }