<?php

/* 
 * The chess controller
 * @author    Dean Clow
 * @email     <dclow@blackjackfarm.com>
 * @copyright 2014 Dean Clow
 */

namespace Application\Controller;
use \Application\Controller\CommonController;

class ChessController extends CommonController
{
    /**
     * The index action
     * @return \Zend\View\Model\JsonModel | \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        $service = $this->getServiceLocator()->get("Application\Service\Chess");
        $games   = $service->fetchAll(null, "date DESC");
        $view    = $this->acceptableViewModelSelector($this->acceptCriteria);
        $view->setVariables(array('games' => $games));
        return $view;
    }
    
    /**
     * The show action
     * @return \Zend\View\Model\ViewModel
     */
    public function showAction()
    {
        $service = $this->getServiceLocator()->get("Application\Service\Chess");
        $id      = $this->params()->fromRoute("id", null);
        $game    = $service->fetchById($id);
        $view = new \Zend\View\Model\ViewModel();
        $view->setVariables(array('game' => $game));
        return $view;
    }
}