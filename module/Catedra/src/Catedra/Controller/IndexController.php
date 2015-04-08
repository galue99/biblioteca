<?php


namespace Catedra\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Catedra\Model\Catedra;  
use Catedra\Form\CatedraForm;

class IndexController extends AbstractActionController
{
    protected $catedraTable;

    public function indexAction()
    {
       return new ViewModel(array(
             'catedras' => $this->getCatedraTable()->fetchAll(),
         ));
    }

    public function addAction()
    {
      	 $form = new CatedraForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();

         if ($request->isPost()) {
       
             $catedra = new Catedra();
            
             $form->setInputFilter($catedra->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $catedra->exchangeArray($form->getData());
                 $this->getCatedraTable()->saveCatedra($catedra);
                 // Redirect to list of albums
                 return $this->redirect()->toRoute('catedra');
             }

         }
         return array('form' => $form);

    }

    public function editAction()
    {


        $cat_id = (int) $this->params()->fromRoute('id', 0);
        
         if (!$cat_id) {
             return $this->redirect()->toRoute('catedra');
         }

         try {
             $catedra = $this->getCatedraTable()->getCatedra($cat_id);
         }
         catch (\Exception $ex) {

             return $this->redirect()->toRoute('catedra', array(
                 'action' => 'add'
             ));
         }

        $request = $this->getRequest();
        $form  = new CatedraForm();
        $form->bind($catedra);
              
         if ($request->isPost()) {
            
             $form->setData($request->getPost());   

             if ($form->isValid()) {

                try {

                    $this->getCatedraTable()->updateCatedra($catedra,$cat_id);

                    return $this->redirect()->toRoute('catedra');

                    } catch (\Exception $e) {
                        die($e->getMessage());
                     
                    }
             }
         }

         return array( 
             'id' => $cat_id,
             'form' => $form,
         );
    

    }

     public function deleteAction()
    {
    
     $cat_id = (int) $this->params()->fromRoute('id', 0);

         if (!$cat_id) {
             return $this->redirect()->toRoute('catedra');
         }

         $request = $this->getRequest();

         if ($request->isPost()) {
             $del = $request->getPost('del', 'No');

             if ($del == 'Yes') {
                 $cat_id = (int) $request->getPost('id');
                 $this->getCatedraTable()->deleteCatedra($cat_id);
             }

             // Redirect to list of albums
             return $this->redirect()->toRoute('catedra');
         }

         return array(
             'cat_id'    => $cat_id,
             'catedra' => $this->getCatedraTable()->getCatedra($cat_id)
         );

    }


    public function getCatedraTable()
    {
        if (!$this->catedraTable) {
            $sm = $this->getServiceLocator();
            $this->catedraTable = $sm->get('Catedra\Model\CatedraTable');
        }
        return $this->catedraTable;
    }



}
