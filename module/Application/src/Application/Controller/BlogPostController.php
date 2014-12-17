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
    
    /**
     * Show a full single post
     * @return \Zend\View\Model\JsonModel | \Zend\View\Model\ViewModel
     */
    public function showAction()
    {
        $service = $this->getServiceLocator()->get("Application\Service\BlogPost");
        $results = $service->fetchById($this->params()->fromRoute("id"));
        $results = $this->getServiceLocator()->get("Application\Service\BlogComment")->attachComments(array($results));
        $view = $this->acceptableViewModelSelector($this->acceptCriteria);
        $view->setVariables(array(
            'post' => $results[0]
        ));
        return $view;
    }
    
    /**
     * The add blog post action
     * @return \Zend\View\Model\JsonModel | \Zend\View\Model\ViewModel
     */
    public function addAction()
    {
        $isSubmitted = $this->params()->fromPost('submitted', 
                                                null);
        $model  = new \Application\Model\BlogPost();
        if($isSubmitted){
            //add a new blog entry
            $model  ->setBody($this->params()->fromPost('body'))
                    ->setBriefBody($this->params()->fromPost('shortbody'))
                    ->setCreatedBy("Dean Clow")
                    ->setDate(date("Y-m-d"))
                    ->setTitle($this->params()->fromPost('title'))
                    ->setTitleImage($this->params()->fromPost('titleimage'));
            $model  = $this->getServiceLocator()->get("Application\Service\BlogPost")->insert($model);
            //redirect the user here
            return $this->redirect()->toRoute('blog-post/index');
        }
        $view = $this->acceptableViewModelSelector($this->acceptCriteria);
        $view->setVariables(array(
            'model' => $model
        ));
        return $view;
    }
    
    /**
     * Edit a blog post
     * @return \Zend\View\Model\JsonModel | \Zend\View\Model\ViewModel
     */
    public function editAction()
    {
        $id          = $this->params()->fromRoute("id");
        $isSubmitted = $this->params()->fromPost('submitted', 
                                                null);
        $model  = $this->getServiceLocator()->get("Application\Service\BlogPost")->fetchById($id);
        if($isSubmitted){
            //add a new blog entry
            $model  ->setBody($this->params()->fromPost('body'))
                    ->setBriefBody($this->params()->fromPost('shortbody'))
                    ->setTitle($this->params()->fromPost('title'))
                    ->setTitleImage($this->params()->fromPost('titleimage'));
            $model  = $this->getServiceLocator()->get("Application\Service\BlogPost")->update($model);
            //redirect the user here
            return $this->redirect()->toRoute('blog-post/index');
        }
        $view = $this->acceptableViewModelSelector($this->acceptCriteria);
        $view->setVariables(array(
            'model' => $model
        ));
        return $view;
    }
    
    /**
     * Delete a blog post
     * @return void
     */
    public function deleteAction()
    {
        $id = $this->params()->fromRoute("id");
        $result = $this->getServiceLocator()->get("Application\Service\BlogPost")->delete($id);
        return $this->redirect()->toRoute('blog-post/index');
    }
    
    /**
     * Parse the old blog data into the new system (only run once)
     * @return \Zend\View\Model\ViewModel
     */
    public function parseLegacyDataAction()
    {
        $result = $this->getServiceLocator()->get("Application\Service\BlogPost")->parseLegacyData();
        $view = new \Zend\View\Model\ViewModel();
        $view->setVariables(array(
            'result' => (int)$result
        ));
        return $view;
    }
}