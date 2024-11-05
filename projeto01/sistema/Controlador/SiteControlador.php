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
        $posts = (new PostModelo())->busca("status = 1 ");
        echo $this->template->renderizar('index.html',[
            'posts' => $posts->resultado(true),
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

    public function categoria(int $id): void
    {
        $posts = (new CategoriaModelo())->posts($id);
        echo $this->template->renderizar('categoria.html',[
            'posts' => $posts,
            'categorias' => (new CategoriaModelo())->busca()
        ]);

        var_dump($posts);
    }

    public function buscar(): void
    {
        $busca = filter_input(INPUT_POST, 'busca', FILTER_DEFAULT);
    
        if (isset($busca)) {
            // Corrigindo a string da consulta SQL
            $posts = (new PostModelo())->busca("status = 1 AND titulo LIKE '%{$busca}%'")->resultado(true);
            
            // Verificando se o resultado é um array antes do foreach
            if (is_array($posts)) {
                foreach ($posts as $post) {
                    echo $post->titulo . '<hr><div class="text-white">' . $post->conteudo . '</div>';
                }
            } else {
                echo "Nenhum post encontrado.";
            }
        }
    }
}