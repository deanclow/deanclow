<?php

/* 
 * The user controller
 * @author    Dean Clow
 * @email     <dclow@blackjackfarm.com>
 * @copyright 2014 Dean Clow
 */

namespace Wedding\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Form\Annotation\AnnotationBuilder;
use Zend\View\Model\ViewModel; 
use Application\Model\User;

class UserController extends \Application\Controller\UserController
{
    /**
     * The login action
     * @return \Zend\View\ViewModel
     */
    public function loginAction()
    {
        //if already login, redirect to success page 
        if ($this->getAuthService()->hasIdentity()){
            return $this->redirect()->toRoute('home');
        }
        
        $request = $this->getRequest();
        if ($request->isPost()){
            $post = $request->getPost();
            //check authentication...
            $this->getAuthService()->getAdapter()
                                   ->setIdentity($request->getPost('username'))
                                   ->setCredential($request->getPost('password'));

            $result = $this->getAuthService()->authenticate();
            $this->getSessionStorage()
                ->setRememberMe(1);
            //set storage again 
            $this->getAuthService()->setStorage($this->getSessionStorage());
            $this->getAuthService()->getStorage()->write($request->getPost('username'));
            return $this->redirect()->toRoute('weddingindex');
        }
        return $this->acceptableViewModelSelector($this->acceptCriteria);
    }
    
    /**
     * The log out action
     * @return \Zend\View\ViewModel
     */
    public function logoutAction()
    {
        $this->getSessionStorage()->forgetMe();
        $this->getAuthService()->clearIdentity();
        return $this->redirect()->toRoute('weddingindex');
    }
}