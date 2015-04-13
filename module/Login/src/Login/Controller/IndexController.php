<?php

namespace Login\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;
use Login\Model\Empleado;
use Login\Form\EmpleadosForm;


class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $view = new ViewModel();
        $this->layout('layout/loginlayout');

        return $view;

       /*  $form = new EmpleadosForm();
         $form->get('submit')->setValue('login');

         $request = $this->getRequest();
         if ($request->isPost()) {
       
             $empleados = new Empleado();
            
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $empleados->exchangeArray($form->getData());

                 if($this->getEmpleadoTable()->getEmpleado($empleado)!=null){

                 	return $this->redirect()->toRoute('/');

                 }else{

                 	return $this->redirect()->toRoute('/');

                 }

             }

             $email=$request->getPost('email');
             $password=$request->getPost('password');

              include "conexion.php";
                        
                        header('Content-Type: text/html; charset=utf-8');

                        mysql_select_db($database_Connection_biblioteca, $Connection_biblioteca);
                        $auth= sprintf(" SELECT * FROM `biblioteca_db`.`empleado`
                                                    WHERE email = '".$email."' AND `empleado`.`password` = ".$password.";");

                        $auth_query = mysql_query($auth, $Connection_biblioteca) or die(mysql_error());
                        $row= mysql_fetch_assoc($auth_query);
                        mysql_free_result($auth_query);

                        if($row!=null){

                        	$user_session = new Container('user');
							$user_session->nombre = $row['nombre']." ".$row['apellido'];
							$user_Session->email = $row['email'];
							$user_session->estatus = $row['estatus'];


								$storage         = new ArrayStorage($user_session);
								$manager         = new SessionManager();
								$manager->setStorage($storage);

                        		return $this->redirect()->toRoute('main');
                        }else{
                        	return $this->redirect()->toRoute('login');
                        }
         }

         return array('form' => $form);*/
    }

	public function getEmpleadoTable()
    {
        if (!$this->empleadoTable) {
            $sm = $this->getServiceLocator();
            $this->empleadoTable = $sm->get('Login\Model\EmpleadoTable');
        }
        return $this->empleadoTable;
    }

}
