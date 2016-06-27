<?php

require './autoload.php';

if (!isset($_GET['acao'])) {
    $_GET['acao'] = 'index';
}

    $Server = new Alfa\SGBD('pgsql');
    $Server->setEndereco('127.0.0.1');
    $Server->setPorta(5432);
    $Server->setUsuario('user');
    $Server->setSenha('pass');

    $Banco = new Alfa\BaseDeDados('banco', $Server);

    try {

        $Banco->conectar();
        $Produto = new Alfa\Produto($Banco);

        switch ($_GET['acao']) {
            case 'index':
                require 'public/index.php';
                break;
            case 'create':
                require 'public/create.php';
                break;
            case 'retrieve':
                require 'public/retrieve.php';
                break;
            case 'update':
                require 'public/update.php';
                break;
            case 'delete':
                require 'public/delete.php';
                break;
            default:
                require 'public/index.php';
                break;
        }

        $Banco->desconectar();
    } catch (\PDOException $e) {
        echo $e->getMessage();
    }






