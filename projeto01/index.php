<?php

//localhost link: http://localhost:8081/projeto01/index.php
require __DIR__ . '/vendor/autoload.php';

//require 'Rotas.php';

$dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
var_dump($dados);
echo '<hr>';
$set = [];

foreach ($dados as $chave => $valor ){
    $set[] = "{$chave} = :{$valor}";
    var_dump($set);
    echo '<hr>';
}
$set = implode(', ',$set);
var_dump($set);
echo '<hr>';
$query = "UPDATE categorias SET {$set} WHERE id = 7";
var_dump($query);
echo '<hr>';



// ?>

INSERT INTO `categorias` (`id`, `titulo`, `texto`, `status`) VALUES (NULL, 'teste', 'teste', '1');
<hr>

<form method="post">

<input type="text" name="nome">
<input type="text" name="email">
<input type="text" name="idade">
<input type="submit">


</form>