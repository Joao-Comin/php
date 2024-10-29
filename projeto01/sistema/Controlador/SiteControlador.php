<?php

namespace Sistema\Controlador;

use Sistema\Nucleo\Controlador;
use Sistema\Modelo\PostModelo;
class SiteControlador extends Controlador {

    public function __construct() {
        parent::__construct('Templates/Site/Views');
    }
    public function index(): void
    {
        $posts = (new PostModelo())->ler();
        echo $this->template->renderizar('index.html',[
            'posts' => $posts
            
        ]);
    }
    public function sobre():void
    {
        echo $this->template->renderizar('sobre.html',[
            'sobre' => 'sobre o site',
            'titulo' => 'Sobre Nós'
        ]);
    }

    public function erro404():void
    {
        echo $this->template->renderizar('404.html',[
            'titulo' => 'Página Não Encontrada'
        ]);
    }

}