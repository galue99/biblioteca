<?php


namespace Sanciones\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Sanciones\Model\Sanciones;
use Sanciones\Form\SancionesForm;

class IndexController extends AbstractActionController
{
    protected $sancionesTable;

    public function indexAction()
    {
       return new ViewModel(array(
             'sanciones' => $this->getSancionesTable()->fetchAll(),
         ));
    }

    /*public function addAction()
    {
      	 $form = new SancionesForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();

         if ($request->isPost()) {
       
             $sanciones = new Sanciones();
            
             $form->setInputFilter($sanciones->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $sanciones->exchangeArray($form->getData());
                 $this->getSancionesTable()->saveSanciones($sanciones);
                 // Redirect to list of albums
                 return $this->redirect()->toRoute('sanciones');
             }

         }
         return array('form' => $form);

    }*/

  /*  public function editAction()
    {
    
        $aut_id = (int) $this->params()->fromRoute('id', 0);

         if (!$aut_id) {
             return $this->redirect()->toRoute('autor');
         }

         try {
             $autor = $this->getAutorTable()->getAutor($aut_id);
         }
         catch (\Exception $ex) {

             return $this->redirect()->toRoute('catedra', array(
                 'action' => 'add'
             ));
         }

        $request = $this->getRequest();
        $form  = new AutorForm();
        $form->bind($autor);
              
         if ($request->isPost()) {
            
             $form->setData($request->getPost());   

             if ($form->isValid()) {

                try {

                    $this->getAutorTable()->updateAutor($autor,$aut_id);

                    return $this->redirect()->toRoute('autor');

                    } catch (\Exception $e) {
                        die($e->getMessage());
                     
                    }
             }
         }

         return array( 
             'id' => $aut_id,
             'form' => $form,
         );

    }*/

    /* public function deleteAction()
    {
         $aut_id = (int) $this->params()->fromRoute('id', 0);

         if (!$aut_id) {
             return $this->redirect()->toRoute('autor');
         }

         $request = $this->getRequest();

         if ($request->isPost()) {
             $del = $request->getPost('del', 'Cancelar');

             if ($del == 'Eliminar') {
                 $aut_id = (int) $request->getPost('id');
                 $this->getAutorTable()->deleteAutor($aut_id);
             }

             // Redirect to list of albums
             return $this->redirect()->toRoute('autor');
         }

         return array(
             'aut_id'    => $aut_id,
             'autor' => $this->getAutorTable()->getAutor($aut_id),
         );

    }*/


    public function getSancionesTable()
    {
        if (!$this->sancionesTable) {
            $sm = $this->getServiceLocator();
            $this->sancionesTable = $sm->get('Sanciones\Model\SancionesTable');
        }
        return $this->sancionesTable;
    }



}

?>