<?php

/* 
 * The blog model
 * @author    Dean Clow
 * @email     <dclow@blackjackfarm.com>
 * @copyright 2014 Dean Clow
 */

namespace Application\Model;

class BlogComment extends \Application\Model\BlogPost
{
    /**
     * Up votes count
     * @var int
     */
    protected $upVotes   = 0;
    
    /**
     * Down votes count
     * @var int
     */
    protected $downVotes = 0;
    
    /**
     * Set the up votes count
     * @param  int $voteCount
     * @return \Application\Model\BlogComment
     */
    public function setUpVotes($voteCount)
    {
        $this->upVotes = $voteCount;
        return $this;
    }
    
    /**
     * Get the up votes
     * @return int
     */
    public function getUpVotes()
    {
        return (int)$this->upVotes;
    }
    
    /**
     * Set the down votes count
     * @param  int $voteCount
     * @return \Application\Model\BlogComment
     */
    public function setDownVotes($voteCount)
    {
        $this->downVotes = $voteCount;
        return $this;
    }
    
    /**
     * Get the down votes count
     * @return int
     */
    public function getDownVotes()
    {
        return (int)$this->downVotes;
    }
}