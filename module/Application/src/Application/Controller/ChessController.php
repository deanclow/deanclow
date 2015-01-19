<?php

/* 
 * The chess controller
 * @author    Dean Clow
 * @email     <dclow@blackjackfarm.com>
 * @copyright 2014 Dean Clow
 */

namespace Application\Controller;
use \Application\Controller\CommonController;
use ZfcDatagrid\Column;

class ChessController extends CommonController
{
    /**
     * The index action
     * @return \Zend\View\Model\JsonModel | \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        $service = $this->getServiceLocator()->get("Application\Service\Chess");
        $games   = $service->fetchAll(null, "date DESC", true);   
        $grid = $this->getServiceLocator()->get('ZfcDatagrid\Datagrid');
        $grid->setTitle('Chess Games');
        $datasource = $service->createDataGridDatasource($games);
        $grid->setDataSource($datasource);
        $col = new Column\Select('white_player');
        $col->setLabel('White');
        $grid->addColumn($col);
        $col = new Column\Select('white_player');
        $col->setLabel('Black');
        $grid->addColumn($col);
        $col = new Column\Select('black_player');
        $col->setLabel('Black');
        $grid->addColumn($col);
        $col = new Column\Select('site');
        $col->setLabel('Site');
        $grid->addColumn($col);
        $col = new Column\Select('date');
        $col->setLabel('Date');
        $grid->addColumn($col);
        $col = new Column\Select('result');
        $col->setLabel('Result');
        if($this->getServiceLocator()->get("AuthService")->hasIdentity()){
            $grid->addColumn($col);
            $col = new Column\Select('edit');
            $col->setLabel('Edit');
            $grid->addColumn($col);
            $col = new Column\Select('delete');
            $col->setLabel('Delete');
        }
        $grid->addColumn($col);
        $col = new Column\Select('play');
        $col->setLabel('Play');
        $grid->addColumn($col);
        $grid->render();
        $view = $grid->getResponse();
        $view->setTemplate('application/chess/index.phtml');
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
    
    /**
     * The add action
     * @return \Zend\View\Model\ViewModel
     */
    public function addAction()
    {
        $isSubmitted = $this->params()->fromPost('submitted', 
                                                 null);
        $model  = new \Application\Model\ChessGame();
        if($isSubmitted){
            $date = new \DateTime($this->params()->fromPost('date'));
            $date = $date->format('Y/m/d');
            //upload the pgn file and link it up to the db
            $target = '/chess/'.$_FILES['pgn']['name'];
            copy($_FILES['pgn']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$target);
            $model  ->setWhitePlayer($this->params()->fromPost('whitePlayer'))
                    ->setWhiteRating($this->params()->fromPost('whiteRating'))
                    ->setBlackPlayer($this->params()->fromPost('blackPlayer'))
                    ->setBlackRating($this->params()->fromPost('blackRating'))
                    ->setRoundNumber($this->params()->fromPost('roundNumber'))
                    ->setDate($date)
                    ->setSite($this->params()->fromPost('site'))
                    ->setResult($this->params()->fromPost('result'))
                    ->setPgnString($target);
            $model  = $this->getServiceLocator()->get("Application\Service\Chess")->insert($model);
            //redirect the user here
            return $this->redirect()->toRoute('chessgames');
        }
        $view = $this->acceptableViewModelSelector($this->acceptCriteria);
        $view->setVariables(array(
            'model' => $model
        ));
        return $view;
    }
    
    /**
     * The edit action
     * @return \Zend\View\Model\ViewModel
     */
    public function editAction()
    {
        $isSubmitted = $this->params()->fromPost('submitted', 
                                                 null);
        $model  = $this->getServiceLocator()->get("Application\Service\Chess")->fetchById($this->params()->fromRoute("id"));
        if($isSubmitted){
            $date = new \DateTime($this->params()->fromPost('date'));
            $date = $date->format('Y/m/d');
            $model  ->setWhitePlayer($this->params()->fromPost('whitePlayer'))
                    ->setWhiteRating($this->params()->fromPost('whiteRating'))
                    ->setBlackPlayer($this->params()->fromPost('blackPlayer'))
                    ->setBlackRating($this->params()->fromPost('blackRating'))
                    ->setRoundNumber($this->params()->fromPost('roundNumber'))
                    ->setDate($date)
                    ->setSite($this->params()->fromPost('site'))
                    ->setResult($this->params()->fromPost('result'))
                    ->setPgnString($model->getPgnString());
            $model  = $this->getServiceLocator()->get("Application\Service\Chess")->update($model);
            //redirect the user here
            return $this->redirect()->toRoute('chessgames');
        }
        $view = $this->acceptableViewModelSelector($this->acceptCriteria);
        $view->setVariables(array(
            'model' => $model
        ));
        return $view;
    }
    
    /**
     * The delete action
     * @return \Zend\View\Model\ViewModel
     */
    public function deleteAction()
    {
        $this->getServiceLocator()->get("Application\Service\Chess")->delete($this->params()->fromRoute("id"));
        return $this->redirect()->toRoute('chessgames');
    }
}