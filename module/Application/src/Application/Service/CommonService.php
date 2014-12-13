<?php

/* 
 * The common service: all services extend from this one
 * @author    Dean Clow
 * @email     <dclow@blackjackfarm.com>
 * @copyright 2014 Dean Clow
 */

namespace Application\Service;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Select;

abstract class CommonService implements ServiceLocatorAwareInterface
{
    /**
     * Holds the service manager
     * @var \Zend\ServiceManager
     */
    protected $sm;
    
    /**
     * Holds a db adapter
     * @var \Zend\Db\Adapter
     */
    protected $db;
    
    /**
     * Holds the db table
     * @var string
     */
    protected $table;
    
    /**
     * Holds the primary key
     * @var string
     */
    protected $primaryKey = "id";
    
    /**
     * Holds the encoder
     * @var obj
     */
    protected $encoder;
    
    /**
     * Constructor
     */
    public function __construct(){}
    
    /**
     * Set the db adapter
     * @param \Zend\Db\Adapter $dbAdapter
     */
    public function setDb($dbAdapter)
    {
        $this->db = new Sql($dbAdapter);
    }
    
    /**
     * Get the database adapter
     * @return \Zend\Db\Adapter
     */
    public function getDb()
    {
        return $this->db;
    }
    
    /**
     * Set the service locator
     * @param ServiceLocatorInterface $serviceLocator
     * @return void
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->sm = $serviceLocator;
    }    

    /**
     * Get the service locator
     * @return \Zend\ServiceManager
     */
    public function getServiceLocator()
    {
        return $this->sm;
    }

    /**
     * Set the model (used in the encoder later)
     * @param object $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }
    
    /**
     * Get the model
     * @return object
     */
    public function getModel()
    {
        return $this->model;
    }
    
    /**
     * Set the primary key
     * @param string $key
     * @return void
     */
    public function setPrimaryKey($key="id")
    {
        $this->primaryKey = $key;
    }
    
    /**
     * Get the primary key
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }
    
    /**
     * Fetch all results
     * @return array
     */
    public function fetchAll()
    {  
        $select = $this->getDb()->select($this->table);
        $select->order($this->getPrimaryKey());
        $statement = $this->getDb()->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        if(is_object($this->getEncoder())){
            return $this->getEncoder()->encode($results, 
                                               $this->model);
        }
        return $results;
    }
    
    /**
     * Set the encoder
     * @param object $encoder
     */
    public function setEncoder($encoder)
    {
        $this->encoder = $encoder;
    }
    
    /**
     * Get the encoder
     * @return object
     */
    public function getEncoder()
    {
        return $this->encoder;
    }
}