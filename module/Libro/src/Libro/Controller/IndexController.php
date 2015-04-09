<?php


namespace Libro\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Libro\Model\Libro;  
use Libro\Form\LibroForm;

class IndexController extends AbstractActionController
{
    protected $libroTable;

    public function indexAction()
    {

     $paginator = $this->getLibroTable()->fetchAll(true);
     
     $paginator->setCurrentPageNumber((int) $this->params()->fromQuery('page', 1));
     
     $paginator->setItemCountPerPage(5);

     return new ViewModel(array(
         'paginator' => $paginator
     ));

       /*return new ViewModel(array(
             'libros' => $this->getLibroTable()->fetchAll(),
         ));*/
    }

    public function addAction()
    {
      	
         $form = new LibroForm();

         $form->get('submit');

         $request = $this->getRequest();

         if ($request->isPost()) {
       
             $libro = new Libro();
           
             /*$form->setInputFilter($libro->getInputFilter());*/
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $libro->exchangeArray($form->getData());
                
                 $this->getLibroTable()->saveLibro($libro);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('libro');
             }

         }
         return array('form' => $form);
    }

    public function editAction()
    {
              
        $libro_bar_id = (int) $this->params()->fromRoute('id', 0);
        
         if (!$libro_bar_id) {
             return $this->redirect()->toRoute('libro');

         }

         try {
             $libro = $this->getLibroTable()->getLibro($libro_bar_id);

         }
         catch (\Exception $ex) {

             return $this->redirect()->toRoute('libro', array(
                 'action' => 'edit'
             ));
         }

        $request = $this->getRequest();
        $form  = new LibroForm();
        $form->bind($libro);

              
         if ($request->isPost()) {

            
             $form->setData($request->getPost());   

             if ($form->isValid()) {

                try {

                    $this->getLibroTable()->updateLibro($libro,$libro_bar_id);


                    return $this->redirect()->toRoute('libro');

                    } catch (\Exception $e) {
                        die($e->getMessage());
                     
                    }
             }
         }

         return array( 
             'id' => $libro_bar_id,
             'form' => $form,
         );



    }




     public function deleteAction()
    {
           
         $libro_bar_id = (int) $this->params()->fromRoute('id', 0);

         if (!$libro_bar_id) {
             return $this->redirect()->toRoute('libro');
         }

         $request = $this->getRequest();

         if ($request->isPost()) {
             $del = $request->getPost('del', 'Cancelar');

             if ($del == 'Eliminar') {
                 $libro_bar_id = (int) $request->getPost('id');
                 $this->getLibroTable()->deleteLibro($libro_bar_id);
             }

             // Redirect to list of albums
             return $this->redirect()->toRoute('libro');
         }

         return array(
             'libro_bar_id'    => $libro_bar_id,
             'libro' => $this->getLibroTable()->getLibro($libro_bar_id),
         );


    }

    public function busquedaAction(){

         return new ViewModel( );

    }


    public function detailsAction()
    {   
       
       return new ViewModel(array(
             'libros' => $this->getLibroTable()->getLibro($this->params()->fromRoute("id",null)),
         ));
    }


     public function reportAction()
    {

       return array('libros' => $this->getLibroTable()->fetchAll());


    }

      public function getLibroTable()
     {
         if (!$this->libroTable) {
             $sm = $this->getServiceLocator();
             $this->libroTable = $sm->get('Libro\Model\LibroTable');
         }
         return $this->libroTable;
     }

     

}
