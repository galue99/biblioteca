<?php


namespace Editor\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Editor\Model\Editor;  
use Editor\Form\EditorForm;

class IndexController extends AbstractActionController
{
    protected $editorTable;

    public function indexAction()
    {
       return new ViewModel(array(
             'editores' => $this->getEditorTable()->fetchAll(),
         ));
    }

    public function addAction()
    {
      	 $form = new EditorForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();

         if ($request->isPost()) {
       
             $editor = new Editor();
            
             $form->setInputFilter($editor->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $editor->exchangeArray($form->getData());
                 $this->getEditorTable()->saveEditor($editor);
                 // Redirect to list of albums
                 return $this->redirect()->toRoute('editor');
             }

         }
         return array('form' => $form);

    }

    public function editAction()
    {
    


         $edit_id = (int) $this->params()->fromRoute('id', 0);
        
         if (!$edit_id) {
             return $this->redirect()->toRoute('editor');
         }

         try {
             $editor = $this->getEditorTable()->getEditor($edit_id);
         }
         catch (\Exception $ex) {

             return $this->redirect()->toRoute('editor', array(
                 'action' => 'add'
             ));
         }

        $request = $this->getRequest();
        $form  = new EditorForm();
        $form->bind($editor);
              
         if ($request->isPost()) {
            
             $form->setData($request->getPost());   

             if ($form->isValid()) {

                try {

                    $this->getEditorTable()->updateEditor($editor,$edit_id);

                    return $this->redirect()->toRoute('editor');

                    } catch (\Exception $e) {
                        die($e->getMessage());
                     
                    }
             }
         }

         return array( 
             'id' => $edit_id,
             'form' => $form,
         );



    }

     public function deleteAction()
    {
         $edit_id = (int) $this->params()->fromRoute('id', 0);

         if (!$edit_id) {
             return $this->redirect()->toRoute('editor');
         }

         $request = $this->getRequest();

         if ($request->isPost()) {
             $del = $request->getPost('del', 'Cancelar');

             if ($del == 'Eliminar') {
                 $edit_id = (int) $request->getPost('id');
                 $this->getEditorTable()->deleteEditor($edit_id);
             }

             // Redirect to list of albums
             return $this->redirect()->toRoute('editor');
         }

         return array(
             'edit_id'    => $edit_id,
             'editor' => $this->getEditorTable()->getEditor($edit_id),
         );

    }

    public function getEditorTable()
    {
        if (!$this->editorTable) {
            $sm = $this->getServiceLocator();
            $this->editorTable = $sm->get('Editor\Model\EditorTable');
        }
        return $this->editorTable;
    }



}
