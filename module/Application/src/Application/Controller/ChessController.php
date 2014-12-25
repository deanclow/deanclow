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
}