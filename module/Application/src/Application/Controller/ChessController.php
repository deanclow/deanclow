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
        print 'hi';
        exit;
        
        $service = $this->getServiceLocator()->get("Application\Service\Chess");
        $games   = $service->fetchAll();
        $view = $this->acceptableViewModelSelector($this->acceptCriteria);
        $view->setVariables(array('games' => $games));
        return $view;
    }
}