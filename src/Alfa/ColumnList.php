<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Alfa;

/**
 * Description of ColumnList
 *
 * @author Macoto
 */
class ColumnList extends \ArrayObject{
    
    protected $_values;
    
    public function __construct($array) {
        parent::__construct($array);
    }
    
    public function setValues(\ArrayObject $values){
        $this->_values = $values;
    }
    
    public function __toString() {
        
        if($this->_values && count($this->_values) == count($this)){
            return implode(", ", $this->_toStringWithValues());
        }else{
            return implode(", ", $this->getArrayCopy());
        }
        
    }
    
    protected function _toStringWithValues(){
        
        $arrayColumnValue = array();
        
        foreach($this as $key => $column){
            
            $value = (is_string($column)) ? "'{$this->_values[$key]}'" : $this->_values[$key];
            
            $arrayColumnValue[] = "{$column} = {$value}";
        }
        
        return $arrayColumnValue;
        
    }
  
}
