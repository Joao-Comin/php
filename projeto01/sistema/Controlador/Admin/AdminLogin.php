<?php

namespace Sistema\Controlador\Admin;

use Sistema\Modelo\CategoriaModelo;
use Sistema\Nucleo\Controlador;
use sistema\Nucleo\Funcoes;

class AdminLogin extends Controlador
{
    public function __construct(){

        parent::__construct('Templates/admin/Views');


    }

    public function login():void
    {
        echo $this->template->renderizar("login.html", []);
    }

    

}