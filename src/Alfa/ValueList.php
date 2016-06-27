<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Alfa;

/**
 * Description of ValueList
 *
 * @author Macoto
 */
class ValueList extends \ArrayObject {

    public function __construct($array) {
        parent::__construct($array);
    }

    public function __toString() {

        return implode(', ', array_map(function($n) {
                    return (is_string($n)) ? "'{$n}'" : $n;
                }, $this->getArrayCopy())
        );
    }

}
