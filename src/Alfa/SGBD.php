<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Alfa;
/**
 * Description of SGDB
 *
 * @author Macoto
 */
class SGBD implements \Alfa\Abstracao\SGBD{

    protected      $endereco;
    protected      $porta;
    protected      $senha;
    protected      $usuario;
    protected      $tipo;
    
    
    function getEndereco() {
        return $this->endereco;
    }

    function getPorta() {
        return $this->porta;
    }

    function getSenha() {
        return $this->senha;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setPorta($porta) {
        $this->porta = $porta;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function __construct($tipo) {        
        $this->tipo = $tipo;        
    }

    
}
