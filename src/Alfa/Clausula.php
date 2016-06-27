<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Alfa;

/**
 * Description of Clausula
 *
 * @author Macoto
 */
class Clausula extends \ArrayObject{
    
    static function init(){
        return new Clausula();
    }
    
    public function where($colunaclausulabind, $valor){
        $this->append("where {$this->setBind($colunaclausulabind, $valor)}");
        return $this;
    }
    
    public function e($colunaclausulabind, $valor){
        $this->append("and {$this->setBind($colunaclausulabind, $valor)}");
        return $this;
    }
    
    public function ou($colunaclausulabind, $valor){
        $this->append("or {$this->setBind($colunaclausulabind, $valor)}");
        return $this;
    }
    
    protected function setBind($colunaclausulabind, $valor){
        return str_replace('?', $valor, $colunaclausulabind);              
    }
    
    public function __toString() {
        return implode(" ", (array) $this);
    }
    
}

