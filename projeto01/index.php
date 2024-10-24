<?php

require_once 'sistema/configuracao.php';
include_once 'funcoes.php';

// $meses = ['janeiro','Fevereiro','Março', 'Abril', 'Maio', 'Junho', 'Julho'];
// var_dump($meses);
// echo'<hr>';

// foreach($meses as $chave){
//     echo $chave.'<br>';
// }


// echo'<hr>';
// echo $_SERVER['HTTP_HOST'];
// echo'<hr>';
// var_dump($_SERVER);


echo saudacao().', hoje é '.dataAtual();