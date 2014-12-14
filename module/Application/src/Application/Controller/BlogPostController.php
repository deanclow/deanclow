<?php

/* 
 * The blog post controller
 * @author    Dean Clow
 * @email     <dclow@blackjackfarm.com>
 * @copyright 2014 Dean Clow
 */

namespace Application\Controller;
use \Application\Controller\CommonController;

class BlogPostController extends CommonController
{
    /**
     * The index action
     * @return \Zend\View\Model\JsonModel | \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        $service = $this->getServiceLocator()->get("Application\Service\BlogPost");
        $results = $service->fetchAll(null, 'date DESC');
        $results = $this->getServiceLocator()->get("Application\Service\BlogComment")->attachComments($results);
        $view = $this->acceptableViewModelSelector($this->acceptCriteria);
        $view->setVariables(array(
            'posts' => $results
        ));
        return $view;
    }
}