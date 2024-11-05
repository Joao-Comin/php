<?php

//localhost link: http://localhost:8081/projeto01/index.php
require __DIR__ . '/vendor/autoload.php';

//require 'Rotas.php';

$dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
var_dump($dados);
echo '<hr>';
$colunas = implode(',',array_keys($dados));
var_dump($colunas);
echo '<hr>';
$valores = ':'.implode(',:',array_keys($dados));
var_dump($valores);
echo '<hr>';
$query = "INSERT INTO posts ({$colunas}) VALUES ({$valores}) ";
var_dump($query);
echo '<hr>';


// ?>

INSERT INTO `categorias` (`id`, `titulo`, `texto`, `status`) VALUES (NULL, 'teste', 'teste', '1');
<hr>

<form method="post">

<input type="text" name="nome">
<input type="text" name="email">
<input type="submit">


</form>