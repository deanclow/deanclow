<?php

/* 
 * The RSVP controller
 * @author    Dean Clow
 * @email     <dclow@blackjackfarm.com>
 * @copyright 2014 Dean Clow
 */

namespace Wedding\Controller;
use \Application\Controller\CommonController;
use ZfcDatagrid\Column;

class RsvpController extends CommonController
{
    /**
     * The index action
     * @return \Zend\View\Model\ViewModel | \Zend\View\Model\JsonModel
     */
    public function indexAction()
    {
        $service = $this->getServiceLocator()->get("Wedding\Service\Rsvp");
        $rsvps   = $service->fetchAll(null, "name", true);   
        $grid = $this->getServiceLocator()->get('ZfcDatagrid\Datagrid');
        $grid->setTitle('Rsvp\'s');
        $datasource = $service->createDataGridDatasource($rsvps);
        $grid->setDataSource($datasource);
        $col = new Column\Select('name');
        $col->setLabel('Name');
        $grid->addColumn($col);
        $col = new Column\Select('plus_one_name');
        $col->setLabel('Guest');
        $grid->addColumn($col);
        $col = new Column\Select('code');
        $col->setLabel('Unique Code');
        $grid->addColumn($col);
        $col = new Column\Select('status');
        $col->setLabel('Status');
        $grid->addColumn($col);
        $col = new Column\Select('edit');
        $col->setLabel('Edit');
        $grid->addColumn($col);
        $col = new Column\Select('delete');
        $col->setLabel('Delete');
        $grid->addColumn($col);
        $grid->render();
        $view = $grid->getResponse();
        $view->setTemplate('wedding/rsvp/index.phtml');
        return $view;
    }
    
    /**
     * The add action
     * @return \Zend\View\Model\ViewModel
     */
    public function addAction()
    {
        $model = new \Wedding\Model\Rsvp();
        $name = $this->params()->fromPost('name', null);
        if(!is_null($name)){
            //post submit
            $model->setName($name)
                  ->setPlusOneName($this->params()->fromPost('guestName'))
                  ->setCode($this->params()->fromPost('code'));
            $model = $this->getServiceLocator()->get("Wedding\Service\Rsvp")->insert($model);
            //redirect to the index page
            return $this->redirect()->toRoute('rsvp');
        }
        $view = new \Zend\View\Model\ViewModel();
        $view->setVariables(array('model' => $model));
        return $view;
    }
    
    /**
     * The edit action
     * @return \Zend\View\Model\ViewModel
     */
    public function editAction()
    {
        $id = $this->params()->fromRoute("id");
        $model = $this->getServiceLocator()->get("Wedding\Service\Rsvp")->fetchById($id);
        $name = $this->params()->fromPost('name', null);
        if(!is_null($name)){
            //post submit
            $model->setName($name)
                  ->setPlusOneName($this->params()->fromPost('guestName'))
                  ->setCode($this->params()->fromPost('code'));
            $model = $this->getServiceLocator()->get("Wedding\Service\Rsvp")->update($model);
            //redirect to the index page
            return $this->redirect()->toRoute('rsvp');
        }
        $view = new \Zend\View\Model\ViewModel();
        $view->setVariables(array('model' => $model));
        return $view;
    }
    
    /**
     * The delete action
     * @return \Zend\View\Model\ViewModel
     */
    public function deleteAction()
    {
        $this->getServiceLocator()->get("Wedding\Service\Rsvp")->delete($this->params()->fromRoute("id"));
        return $this->redirect()->toRoute('rsvp');
    }
    
    /**
     * Holds the rsvp action (where people ACTUALLY rsvp)
     * @return \Zend\View\Model\ViewModel
     */
    public function rsvpAction()
    {
        $hasSubmitted = false;
        $hasError     = false;
        $rsvpType = $this->params()->fromPost('rsvpType', null);
        if(!is_null($rsvpType)){
            $code  = $this->params()->fromPost("code");
            $model = $this->getServiceLocator()->get("Wedding\Service\Rsvp")->fetchAll(array('code' => $code));
            $model = $model[0];
            if(empty($model)){
                $hasError = true;
            }else{
                $model->setStatus($rsvpType)
                      ->setPlusOneName($this->params()->fromPost("plusOne"));
                $model = $this->getServiceLocator()->get("Wedding\Service\Rsvp")->update($model);
                $hasSubmitted = true;
            }
        }
        $view = new \Zend\View\Model\ViewModel();
        $view->setVariables(array('hasSubmitted' => $hasSubmitted,
                                  'hasError'     => $hasError));
        return $view;
    }
    
    /**
     * Search for a users code
     * @return \Zend\View\Model\JsonModel
     */
    public function searchForCodeAction()
    {
        \Zend\Json\Json::$useBuiltinEncoderDecoder = true;
        $code  = $this->params()->fromRoute("id");
        $model = $this->getServiceLocator()->get("Wedding\Service\Rsvp")->fetchAll(array('code' => $code));
        if(!isset($model[0])){
            $model = json_encode(array('model' => 'CODE NOT FOUND'), true);
        }else{
            $model = json_encode($model[0]->toArray());
        }
        $view = new \Zend\View\Model\JsonModel();
        $view->setVariables(array('model' => $model));
        return $view;
    }
}