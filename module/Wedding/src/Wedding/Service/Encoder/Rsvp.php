<?php

/* 
 * The rsvp encoder
 * @author    Dean Clow
 * @email     <dclow@blackjackfarm.com>
 * @copyright 2015 Dean Clow
 */

namespace Wedding\Service\Encoder;
use \Application\Service\Encoder\CommonEncoder;

class Rsvp extends CommonEncoder
{
    /**
     * Holds the db fields and their mapping
     * @var string
     */
    public $fields = array('id'          => 'id',
                           'name'        => 'name',
                           'code'        => 'code',
                           'status'      => 'status',
                           'plusOneName' => 'plus_one_name');

    /**
     * Constructor
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = 'rsvp';
    }
}