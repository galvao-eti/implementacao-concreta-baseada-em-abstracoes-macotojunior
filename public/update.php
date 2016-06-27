<?php

$Produto->update(
                    new \Alfa\ColumnList(array('nome', 'preco')),
                    new \Alfa\ValueList(array($_POST['nome'], $_POST['preco'])),
                    \Alfa\Clausula::init()->where('id = ?', $_POST['id']));

$retorno            = new \stdClass();
$retorno->msg       = 'Produto Alterado';
$retorno->success   = true;

echo json_encode($retorno);

