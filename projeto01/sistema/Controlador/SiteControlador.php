<?php

namespace Sistema\Controlador;

use Sistema\Nucleo\Controlador;
class SiteControlador extends Controlador {

    public function __construct() {
        parent::__construct('Templates/Site/Views');
    }
    public function index(): void
    {
        echo $this->template->renderizar('index.html',[
            
            
        ]);
    }
    public function sobre():void
    {
        echo $this->template->renderizar('sobre.html',[
            'sobre' => 'sobre o site',
            'titulo' => 'Sobre Nós'
        ]);
    }
}