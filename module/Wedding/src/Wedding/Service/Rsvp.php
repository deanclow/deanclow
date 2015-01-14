<?php

/* 
 * The rsvpservice
 * @author    Dean Clow
 * @email     <dclow@blackjackfarm.com>
 * @copyright 2015 Dean Clow
 */

namespace Wedding\Service;
use \Application\Service\CommonService;

class Rsvp extends CommonService
{
    /**
     * Constructor
     * @return void
     */
    public function __construct()
    {
        $this->table = 'rsvp';
    }
    
    /**
     * Create the source for the datagrid
     * @param  array $rs
     * @return array
     */
    public function createDataGridDatasource($rs)
    {
        $finalDatasource = array();
        foreach($rs as $row){
            if($row['status']=='Coming +1'){
                $row['status'] = 'Coming +1 ('.$row['plus_one_name'].')';
                $row['edit']   = '<a href="/wedding/rsvp/edit/'.$row['id'].'">Edit</a>';
                $row['delete']   = '<a href="/wedding/rsvp/delete/'.$row['id'].'">Delete</a>';
            }
            $finalDatasource[] = $row;
        }
        return $finalDatasource;
    }
}