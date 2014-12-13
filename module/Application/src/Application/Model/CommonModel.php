<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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