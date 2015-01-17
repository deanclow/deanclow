<?php

/* 
 * The registry controller
 * @author    Dean Clow
 * @email     <dclow@blackjackfarm.com>
 * @copyright 2014 Dean Clow
 */

namespace Wedding\Controller;
use \Application\Controller\CommonController;

class RegistryController extends CommonController
{
    /**
     * The index action
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        $view = new \Zend\View\Model\ViewModel();
        return $view;
    }
    
    /**
     * Thank you page
     * @return \Zend\View\Model\ViewModel
     */
    public function thankYouAction()
    {
        $view = new \Zend\View\Model\ViewModel();
        return $view;
    }
}