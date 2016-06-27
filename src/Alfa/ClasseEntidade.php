<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Alfa;

use Alfa\Abstracao\Entidade as IEntidade;

/**
 * Description of ClasseEntidade
 *
 * @author Macoto
 */
abstract class ClasseEntidade implements IEntidade{
    
    protected $nome;
    
    public function __construct(\Alfa\BaseDeDados $Database) {
        $this->Database = $Database;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function create($colunas, $valores){
        
        $sql = "INSERT INTO {$this->getNome()} (".(string) $colunas.") VALUES (".(string) $valores.");";        
        $stmt = $this->Database->getConexao()->prepare($sql);
        $stmt->execute();
        
    }
    
    public function retrieve($colunas, $clausula){
        
        $sql = "SELECT ".(string) $colunas." FROM {$this->getNome()} ".(string) $clausula.";";        
        $stmt = $this->Database->getConexao()->prepare($sql);  
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
        
    }
    
    public function update($colunas, $valores, $clausula){
        
        $colunas->setValues($valores);
        $sql = "UPDATE {$this->getNome()} SET ".(string) $colunas." ".(string) $clausula.";";
        $stmt = $this->Database->getConexao()->prepare($sql);
        $stmt->execute();
        
    }
    
    public function delete($clausula){
        
        $sql = "DELETE FROM {$this->getNome()} ".(string) $clausula.";";
        $stmt = $this->Database->getConexao()->prepare($sql);
        $stmt->execute();
        
    }
    
}
