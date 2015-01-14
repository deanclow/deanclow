<?php

/* 
 * The RSVP controller
 * @author    Dean Clow
 * @email     <dclow@blackjackfarm.com>
 * @copyright 2014 Dean Clow
 */

namespace Wedding\Model;

class Rsvp extends \Application\Model\CommonModel
{
    /**
     * The name of the rsvp
     * @var string
     */
    protected $name = "";
    
    /**
     * The unique code of the rsvp
     * @var string
     */
    protected $code = "";
    
    /**
     * Holds the current status
     * @var string
     */
    protected $status = "Unknown";
    
    /**
     * Holds the +1 name, if any
     * @var string
     */
    protected $plusOneName = "";
    
    /**
     * Set the name of the rsvp
     * @param  string $name
     * @return \Wedding\Model\Rsvp
     */
    public function setName($name="")
    {
        $this->name = $name;
        return $this;
    }
    
    /**
     * Set the code
     * @param  string $code
     * @return \Wedding\Model\Rsvp
     */
    public function setCode($code="")
    {
        $this->code = $code;
        return $this;
    }
    
    /**
     * Set the plus one name
     * @param  string $name
     * @return \Wedding\Model\Rsvp
     */
    public function setPlusOneName($name)
    {
        $this->plusOneName = $name;
        return $this;
    }
    
    /**
     * Set the status
     * @param  string $status
     * @return \Wedding\Model\Rsvp
     */
    public function setStatus($status="Unknown")
    {
        $this->status = $status;
        return $this;
    }
    
    /**
     * Get the name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Get the code (if empty, generate a new code)
     * @return string
     */
    public function getCode()
    {
        if(empty($this->code)){
            //generate a code
            $this->code = rand(1000, 9999);
        }
        return $this->code;
    }
    
    /**
     * Get the status
     * @return type
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * Get the plus one name
     * @return type
     */
    public function getPlusOneName()
    {
        return $this->plusOneName;
    }
}