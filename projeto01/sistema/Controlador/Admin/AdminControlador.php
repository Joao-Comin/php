<?php

namespace Sistema\Controlador\Admin;

use Sistema\Nucleo\Controlador;
use Sistema\Nucleo\Funcoes;

class AdminControlador extends Controlador
{
    public function __construct(){

        parent::__construct('Templates/admin/Views');

        $usuario = false;

        if($usuario){
            $this->mensagem->erro("Faça Login para acessar o painel de controle")->flash();

            Funcoes::redirecionar('admin/login');

        }
    }

    

}