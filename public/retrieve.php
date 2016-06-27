<?php

$resultset = $Produto->retrieve(new \Alfa\ColumnList(array('id', 'nome', 'preco')), null);

echo json_encode($resultset);
