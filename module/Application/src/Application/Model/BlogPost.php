<?php

/* 
 * The blog model
 * @author    Dean Clow
 * @email     <dclow@blackjackfarm.com>
 * @copyright 2014 Dean Clow
 */

namespace Application\Model;
use \Application\Model\CommonModel;

class BlogPost extends CommonModel
{
    /**
     * Holds the title of the blog post
     * @var string 
     */
    protected $title     = "";
    
    /**
     * Holds who the blog post was created by
     * @var string
     */
    protected $createdBy = "";
    
    /**
     * Holds the body of the blog post
     * @var string
     */
    protected $body      = "";
    
    /**
     * Set the title
     * @param  string $title
     * @return \Application\Model\BlogPost
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
    
    /**
     * Get the title
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Set the created by
     * @param  string $createdBy
     * @return \Application\Model\BlogPost
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }
    
    /**
     * Get the created by
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
    
    /**
     * Set the body text
     * @param  string $body
     * @return \Application\Model\BlogPost
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }
    
    /**
     * Get the body
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }
}