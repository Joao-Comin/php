<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php

//localhost link: http://localhost:8081/projeto01/index.php

require_once 'sistema/configuracao.php';
include_once 'sistema/Nucleo/funcoes.php';
include './sistema/Nucleo/Mensagem.php';
include './sistema/Nucleo/Controlador.php';

use Projeto01\Sistema\Nucleo\Controlador as controlador;

$controlador = new controlador('sei lá');
echo'<hr>';
var_dump($controlador);

use Projeto01\Sistema\Nucleo\Funcoes as funcoes;
// use projeto01\sistema\Nucleo\Mensagem as msg;
// echo (new msg)->sucesso('Servidor Aberto Com Sucesso');



