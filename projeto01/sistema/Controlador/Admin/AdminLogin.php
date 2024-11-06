<?php

namespace Sistema\Controlador\Admin;

use Sistema\Modelo\CategoriaModelo;
use Sistema\Nucleo\Controlador;
use Sistema\Nucleo\Funcoes;
use Sistema\Modelo\UsuarioModelo;

class AdminLogin extends Controlador
{
    public function __construct(){

        parent::__construct('Templates/admin/Views');


    }

    public function login():void
    {
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(isset($dados)){
            if(in_array('',$dados)){

                $this->mensagem->erro('Todos os campos são obrigatorio')->flash();
            }

            else{
                $usuario = (new UsuarioModelo())->login($dados,3);
                if($usuario){
                    Funcoes::redirecionar('admin/login');
                }
            }
        }
        echo $this->template->renderizar("login.html", []);
    }
}


    // private function checarDados(array $dados):bool
    // {
    //     if(empty($dados['email']))
    //     {
    //         $this->mensagem->erro('Campo Email é Obrigatorio')->flash();
    //         return false;

    //     }
    //     if(empty($dados['senha']))
    //     {
    //         $this->mensagem->erro('Campo Senha é Obrigatorio')->flash();
    //         return false;

    //     }
    //     return true;

    // }

    

