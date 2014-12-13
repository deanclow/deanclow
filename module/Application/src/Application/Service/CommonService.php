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
     * Constructor
     */
    public function __construct(){}
    
    /**
     * Set the db adapter
     * @param \Zend\Db\Adapter $db
     */
    public function setDb($db)
    {
        $this->db = $db;
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
     * Fetch all results
     * @return array
     */
    public function fetchAll()
    {
        /*$sql = 'UPDATE ' . $qi('artist')
            . ' SET ' . $qi('name') . ' = ' . $fp('name')
            . ' WHERE ' . $qi('id') . ' = ' . $fp('id');
        $statement = $adapter->query($sql);*/
        $resultset = $this->db->select($this->table);
        return $resultset->toArray();
    }
}