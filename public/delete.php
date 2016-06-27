<?php

$Produto->delete(\Alfa\Clausula::init()->where('id = ?', $_POST['id']));

$retorno            = new \stdClass();
$retorno->msg       = 'Produto Excluído';
$retorno->success   = true;

echo json_encode($retorno);
