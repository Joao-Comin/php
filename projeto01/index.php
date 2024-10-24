<?php

//localhost link: http://localhost:8081/projeto01/index.php

require_once 'sistema/configuracao.php';
include_once 'funcoes.php';

$cpf = '111.433.699-80';
var_dump(validarCpf($cpf));

// echo $limparNumero = preg_replace('/[^0-9]/','', $cpf);