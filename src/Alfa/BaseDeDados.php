<?php



/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Alfa;
/**
 * Description of Banco
 *
 * @author Macoto
 */
class BaseDeDados implements Abstracao\BaseDeDados{
    
    protected $conexao;
    protected $nome;
    protected $server;
    
    public function __construct($nome, SGBD $servidor) {
        
        $this->nome = $nome;
        $this->server = $servidor;
        
    }
    
    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function getConexao(){
        return $this->conexao;
    }
    
    public function conectar() {

        if ($this->server->getTipo() == 'pgsql') {            
            $this->conexao = new \PDO("pgsql:host={$this->server->getEndereco()} dbname={$this->nome} user={$this->server->getUsuario()} password={$this->server->getSenha()} port={$this->server->getPorta()}");                      
        }else if($this->server->getTipo() == 'mysql'){
            $this->conexao = new PDO("mysql:host={$this->server->getEndereco()};dbname={$this->nome}", $this->server->getUsuario(), $this->server->getSenha(), array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        }else{
            throw new Exception("Tipo de banco de dados não suportado");
        }
        
    }
    
    public function desconectar() {
        
        if($this->conexao){
            $this->conexao = null;
        }
        
    }
    
    public function __destruct() {
        $this->desconectar();
    }
     
    
}
