<?php

//localhost link: http://localhost:8081/projeto01/index.php
require __DIR__ . '/vendor/autoload.php';

//require 'Rotas.php';

$sessao = new Sistema\Nucleo\Sessao();

// $sessao->criar('nome','joao' );

var_dump($sessao->carregar());
echo '<hr>';
var_dump($sessao->checar('nome'));
echo'<hr>';
//$sessao->limpar('nome');
// var_dump($sessao->checar('usuario'));
echo'<hr>';
$sessao->deletar();
// ?>
