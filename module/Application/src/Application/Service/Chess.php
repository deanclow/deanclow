<?php

/* 
 * The chess controller
 * @author    Dean Clow
 * @email     <dclow@blackjackfarm.com>
 * @copyright 2014 Dean Clow
 */

namespace Application\Service;
use \Application\Service\CommonService;

class Chess extends CommonService
{
    /**
     * Constructor
     * @return void
     */
    public function __construct()
    {
        $this->table = 'chess';
    }
}