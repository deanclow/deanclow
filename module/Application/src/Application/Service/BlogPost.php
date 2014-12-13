<?php

/* 
 * The blog comment controller
 * @author    Dean Clow
 * @email     <dclow@blackjackfarm.com>
 * @copyright 2014 Dean Clow
 */

namespace Application\Service;
use \Application\Service\CommonService;

class BlogPost extends CommonService
{
    /**
     * Constructor
     * @return void
     */
    public function __construct()
    {
        $this->table = 'blog_post';
    }
}