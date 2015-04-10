<?php

namespace Prestamos\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Prestamos\Model\Prestamos;  
use Prestamos\Form\PrestamosForm;

class IndexController extends AbstractActionController
{
    protected $PrestamosTable;

    public function indexAction()
    {
       return new ViewModel(array(
             'prestamos' => $this->getPrestamosTable()->fetchAll(),
         ));
    }

    public function addAction()
    {
      	 $form = new PrestamosForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();

         if ($request->isPost()) {
       
             $prestamos = new Prestamos();
            
             /*$form->setInputFilter($prestamos->getInputFilter());*/
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $prestamos->exchangeArray($form->getData());
                 $this->getPrestamosTable()->savePrestamo($prestamos);
                 // Redirect to list of albums
                 return $this->redirect()->toRoute('prestamos');
             }

         }
         return array('form' => $form);

    }

    public function editAction()
    {
    
         $prest_id = (int) $this->params()->fromRoute('id', 0);
        
         if (!$prest_id) {
             return $this->redirect()->toRoute('prestamos');
         }

         try {
             $prestamos = $this->getPrestamosTable()->getPrestamo($prest_id);
         }
         catch (\Exception $ex) {

             return $this->redirect()->toRoute($this->basePath('/prestamos'));
         }

        $request = $this->getRequest();
        $form  = new PrestamosForm();
        $form->bind($prestamos);
              
         if ($request->isPost()) {
            
             $form->setData($request->getPost());   

             if ($form->isValid()) {

                try {

                    $this->getPrestamosTable()->updatePrestamos($prestamos,$prest_id);

                    return $this->redirect()->toRoute('prestamos');

                    } catch (\Exception $e) {
                        die($e->getMessage());
                     
                    }
             }
         }

         return array( 
             'id' => $prest_id,
             'form' => $form,
         );

    }


     public function deleteAction()
    {
         $prest_id = (int) $this->params()->fromRoute('id', 0);

         if (!$prest_id) {
             return $this->redirect()->toRoute('prestamos');
         }

         $request = $this->getRequest();

         if ($request->isPost()) {
             $del = $request->getPost('del', 'Cancelar');

             if ($del == 'Eliminar') {
                 $prest_id = (int) $request->getPost('id');
                 $this->getPrestamosTable()->deletePrestamo($prest_id);
             }

             // Redirect to list of albums
             return $this->redirect()->toRoute('prestamos');
         }

         return array(
             'prest_id'    => $prest_id,
             'prestamos' => $this->getPrestamosTable()->getPrestamo($prest_id),
         );

    }

    public function fechasAction()
    {
       return new ViewModel();
    }

    public function devolucionAction()
    {
         $form = new PrestamosForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();

         if ($request->isPost()) {
       
             $prestamos = new Prestamos();
            
             /*$form->setInputFilter($prestamos->getInputFilter());*/
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $prestamos->exchangeArray($form->getData());
                 $this->getPrestamosTable()->saveDevolucion($prestamos);
                 // Redirect to list of albums
                 return $this->redirect()->toRoute('prestamos');
             }

         }
         return array('form' => $form);

    }


    public function reportAction()
    {

       return array('prestamos' => $this->getPrestamosTable()->fetchAll());


    }



    public function getPrestamosTable()
    {
        if (!$this->PrestamosTable) {
            $sm = $this->getServiceLocator();
            $this->PrestamosTable = $sm->get('prestamos\Model\prestamosTable');
        }
        return $this->PrestamosTable;
    }



}
