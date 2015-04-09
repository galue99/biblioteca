<?php


namespace Usuarios\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Usuarios\Model\Usuarios;  
use Usuarios\Form\UsuariosForm;

class IndexController extends AbstractActionController
{
    protected $usuariosTable;

    public function indexAction()
    {
       return new ViewModel(array(
             'usuarios' => $this->getUsuariosTable()->fetchAll(),
         ));
    }

    public function addAction()
    {
      	 $form = new UsuariosForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();

         if ($request->isPost()) {
       
             $usuarios = new Usuarios();
            
            
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $usuarios->exchangeArray($form->getData());
                 $this->getUsuariosTable()->saveUsuarios($usuarios);
                 // Redirect to list of albums
                 return $this->redirect()->toRoute('usuarios');
             }

         }
         return array('form' => $form);

    }

    public function editAction()
    {
    
        $user_id = (int) $this->params()->fromRoute('id', 0);

         if (!$user_id) {
             return $this->redirect()->toRoute('usuarios');
         }

         try {
             $usuarios = $this->getUsuariosTable()->getUsuarios($user_id);
         }
         catch (\Exception $ex) {

             return $this->redirect()->toRoute('usuarios', array(
                 'action' => 'add'
             ));
         }

        $request = $this->getRequest();
        $form  = new UsuariosForm();
        $form->bind($usuarios);
              
         if ($request->isPost()) {
            
             $form->setData($request->getPost());   

             if ($form->isValid()) {

                try {

                    $this->getUsuariosTable()->updateUsuarios($usuarios,$user_id);

                    return $this->redirect()->toRoute('usuarios');

                    } catch (\Exception $e) {
                        die($e->getMessage());
                     
                    }
             }
         }

         return array( 
             'id' => $user_id,
             'form' => $form,
         );

    }

     public function deleteAction()
    {
         $user_id = (int) $this->params()->fromRoute('id', 0);

         if (!$user_id) {
             return $this->redirect()->toRoute('usuarios');
         }

         $request = $this->getRequest();

         if ($request->isPost()) {
             $del = $request->getPost('del', 'Cancelar');

             if ($del == 'Eliminar') {
                 $user_id = (int) $request->getPost('id');
                 $this->getUsuariosTable()->deleteUsuarios($user_id);
             }

             // Redirect to list of albums
             return $this->redirect()->toRoute('usuarios');
         }

         return array(
             'user_id'    => $user_id,
             'usuarios' => $this->getUsuariosTable()->getUsuarios($user_id),
         );

    }


    public function getUsuariosTable()
    {
        if (!$this->usuariosTable) {
            $sm = $this->getServiceLocator();
            $this->usuariosTable = $sm->get('Usuarios\Model\UsuariosTable');
        }
        return $this->usuariosTable;
    }



}

?>