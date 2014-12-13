<?php

/* 
 * The common model: all models extend from this one
 * @author    Dean Clow
 * @email     <dclow@blackjackfarm.com>
 * @copyright 2014 Dean Clow
 */

namespace Application\Model;

class CommonModel
{
    /**
     * The base constructor
     * Optionally, hydrates if possible
     * @param string/array $obj     Contains the info to hydrate the model
     */
    public function __construct($obj="")
    {
        if(is_array($obj)){
            $this->hydrate($obj);
        }
    }
    
    /**
     * Hydrate the model
     * @param type $obj
     * @return void
     */
    private function hydrate($obj)
    {
        foreach($obj as $key=>$value){
            if(property_exists($this, $key)){
                $this->$key = $value;
            }
        }
    }
}