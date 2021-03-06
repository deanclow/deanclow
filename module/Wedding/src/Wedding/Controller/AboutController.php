<?php

/* 
 * The about controller
 * @author    Dean Clow
 * @email     <dclow@blackjackfarm.com>
 * @copyright 2014 Dean Clow
 */

namespace Wedding\Controller;
use \Application\Controller\CommonController;

class AboutController extends CommonController
{
    /**
     * The index action
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        return $this->acceptableViewModelSelector($this->acceptCriteria);
    }
}