<?php


namespace Empleados\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Empleados\Model\Empleado;
use Empleados\Form\EmpleadosForm;

class IndexController extends AbstractActionController
{
    protected $empleadoTable;

    public function indexAction()
    {
       return new ViewModel(array(
             'empleados' => $this->getEmpleadoTable()->fetchAll(),
         ));
    }

    public function addAction()
    {
      	 $form = new EmpleadosForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();

         if ($request->isPost()) {
       
             $empleados = new Empleados();
            
             $form->setInputFilter($empleados->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $empleados->exchangeArray($form->getData());
                 $this->getEmpleadoTable()->saveEmpleado($empleado);
                 // Redirect to list of albums
                 return $this->redirect()->toRoute('empleados');
             }

         }
         return array('form' => $form);

    }

    public function editAction()
    {
    
        $emp_id = (int) $this->params()->fromRoute('id', 0);

         if (!$emp_id) {
             return $this->redirect()->toRoute('empleados');
         }

         try {
             $empleado = $this->getEmpleadoTable()->getEmpleado($emp_id);
         }
         catch (\Exception $ex) {

             return $this->redirect()->toRoute('empleados', array(
                 'action' => 'add'
             ));
         }

        $request = $this->getRequest();
        $form  = new EmpleadosForm();
        $form->bind($empleado);
              
         if ($request->isPost()) {
            
             $form->setData($request->getPost());   

             if ($form->isValid()) {

                try {

                    $this->getEmpleadoTable()->updateEmpleado($empleado,$emp_id);

                    return $this->redirect()->toRoute('empleados');

                    } catch (\Exception $e) {
                        die($e->getMessage());
                     
                    }
             }
         }

         return array( 
             'id' => $emp_id,
             'form' => $form,
         );

    }


     public function deleteAction()
    {
         $emp_id = (int) $this->params()->fromRoute('id', 0);

         if (!$emp_id) {
             return $this->redirect()->toRoute('autor');
         }

         $request = $this->getRequest();

         if ($request->isPost()) {
             $del = $request->getPost('del', 'Cancelar');

             if ($del == 'Eliminar') {
                 $emp_id = (int) $request->getPost('id');
                 $this->getEmpleadoTable()->deleteEmpleado($emp_id);
             }

             // Redirect to list of albums
             return $this->redirect()->toRoute('empleado');
         }

         return array(
             'emp_id'    => $emp_id,
             'empleado' => $this->getEmpleadoTable()->getEmpleado($emp_id),
         );

    }

     public function reportAction()
    {

       return array('empleados' => $this->getEmpleadoTable()->fetchAll());


    }


    public function getEmpleadoTable()
    {
        if (!$this->empleadoTable) {
            $sm = $this->getServiceLocator();
            $this->empleadoTable = $sm->get('Empleados\Model\EmpleadoTable');
        }
        return $this->empleadoTable;
    }



}

?>