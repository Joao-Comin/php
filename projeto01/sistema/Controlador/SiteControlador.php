<?php

namespace Sistema\Controlador;

use Sistema\Nucleo\Controlador;
use Sistema\Modelo\PostModelo;
use Sistema\Nucleo\Funcoes; 
use Sistema\Modelo\CategoriaModelo;


class SiteControlador extends Controlador {

    public function __construct() {
        parent::__construct('Templates/Site/Views');
    }
    public function index(): void
    {
        $posts = (new PostModelo())->busca();
        echo $this->template->renderizar('index.html',[
            'posts' => $posts,
            'categorias' => (new CategoriaModelo())->busca()
            
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
    public function post(int $id):void
    {
        $post = (new PostModelo())->buscaPorId($id);
        if(!$post){
            Funcoes::redirecionar('404');
        }

        echo $this->template->renderizar('post.html',[
            'post' => $post,
            'categorias' => (new CategoriaModelo())->busca()
        ]);
        
    }

}