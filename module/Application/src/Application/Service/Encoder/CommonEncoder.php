<?php

/* 
 * The common encoder: all encoders extend from this one
 * @author    Dean Clow
 * @email     <dclow@blackjackfarm.com>
 * @copyright 2014 Dean Clow
 */

namespace Application\Service\Encoder;

abstract class CommonEncoder
{
    /**
     * Holds the primary key of the table
     * @var string
     */
    public $primaryKey = "id";
    
    /**
     * Holds the table name
     * @var string
     */
    protected $table = "";
    
    /**
     * Holds the db fields and their mapping
     * @var string
     */
    public $fields = array();
    
    /**
     * The constructor
     */
    public function __construct();
}