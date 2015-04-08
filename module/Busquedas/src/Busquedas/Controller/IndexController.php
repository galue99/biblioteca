<?php


namespace Busquedas\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
        
    public function AutorAction()
    {
       return new ViewModel();
    }

    public function CatedraAction()
    {
       return new ViewModel();
    }

    public function AlfabeticaAction()
    {
       return new ViewModel();
    }

    public function BarraAction()
    {
       return new ViewModel();
    }

    public function EditorAction()
    {
       return new ViewModel();
    }
   
}

?>