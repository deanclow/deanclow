<?php

/* 
 * The blog post encoder
 * @author    Dean Clow
 * @email     <dclow@blackjackfarm.com>
 * @copyright 2014 Dean Clow
 */

namespace Application\Service\Encoder;
use \Application\Service\Encoder\CommonEncoder;

class BlogPost extends CommonEncoder
{
    /**
     * Holds the db fields and their mapping
     * @var string
     */
    public $fields = array('title'      => 'title',
                           'createdBy'  => 'created_by',
                           'body'       => 'body');
 
    /**
     * Constructor
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = 'blog_post';
    }
}