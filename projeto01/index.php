<?php

require_once 'sistema/configuracao.php';
include_once 'funcoes.php';


// if(ValidarEmail('teste@gmaill.com')){
//     echo'Endereço de email válido';
// }else{  
//     echo 'Email Incorreto';
// }


// var_dump(validarUrl('http://teste.com'));
if (validarUrl('http://teste.com')) {
    echo 'URL válida';
} else {
    echo 'URL invalida';
}

// var_dump(ValidarEmail('teste@gmail.com'));
