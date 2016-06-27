<?php

$Produto->create(new \Alfa\ColumnList(array('nome', 'preco')), new \Alfa\ValueList(array($_POST['nome'], $_POST['preco'])));

$retorno            = new \stdClass();
$retorno->msg       = 'Novo produto adicionado';
$retorno->success   = true;

echo json_encode($retorno);
