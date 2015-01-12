<?php

/* 
 * The contact controller
 * @author    Dean Clow
 * @email     <dclow@blackjackfarm.com>
 * @copyright 2014 Dean Clow
 */

namespace Wedding\Controller;
use \Application\Controller\CommonController;
use Zend\Session\Container;
use Zend\Mail;

class ContactController extends CommonController
{
    /**
     * The index action
     * @return \Zend\View\Model\JsonModel | \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        $sent = false;
        $session = new Container('captcha');
        // check if $_SESSION['captcha'] created with AJAX exists
        if(!empty($session->qaptchaKey) && $session->qaptchaKey!="not sent"){
            $myVar = $session->qaptchaKey;
            // check if the random input created exists and is empty
            if(isset($_POST[''.$myVar.'']) && empty($_POST[''.$myVar.''])){
                $sent = true;
                $mail = new Mail\Message();
                $mail->setBody($this->params()->fromPost('body'));
                $mail->setFrom($this->params()->fromPost('email'), 'deanclow.com');
                $mail->addTo('deanrclow@gmail.com', 'Dean Clow');
                $mail->addTo('alanasimonethomas@gmail.com', 'Alana Thomas');
                $mail->setSubject('Wedding Page: Contact Us!');
                try{
                    $transport = new Mail\Transport\Sendmail();
                    $transport->send($mail);
                } catch (\Zend\Mail\Exception\RuntimeException $ex) {
                }   
            }
        }
        $session->getManager()->getStorage()->clear('captcha');
        $view = $this->acceptableViewModelSelector($this->acceptCriteria);
        $view->setVariables(array('sent' => $sent));
        return $view;
    }
}