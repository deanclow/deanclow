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
            if($row['plus_one_name']==""){
                $row['plus_one_name'] = "Guest";
            }
            if($row['status']=='Coming'){
                if($row['plus_one_status']=='Coming'){
                    $row['status'] = 'Coming +Guest';
                }else{
                    $row['status'] = 'Coming (No guest)';
                }
            }elseif($row['status']=='Not coming'){
                $row['status'] = 'Not coming';
            }else{
                $row['status'] = 'Not RSVP\'d yet';
            }
            $row['edit']   = '<a href="/rsvp/edit/'.$row['id'].'">Edit</a>';
            $row['delete']   = '<a href="/rsvp/delete/'.$row['id'].'">Delete</a>';
            $finalDatasource[] = $row;
        }
        return $finalDatasource;
    }
}