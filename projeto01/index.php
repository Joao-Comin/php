<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php

//localhost link: http://localhost:8081/projeto01/index.php

require_once 'sistema/configuracao.php';
include_once 'funcoes.php';
include './sistema/Nucleo/Mensagem.php';



$msg = new Mensagem();
echo $msg->sucesso('Mensagem de Sucesso')->renderizar();
echo '<hr>';
echo $msg->erro('Mensagem de Erro')->renderizar();
echo'<hr>';
var_dump($msg);
