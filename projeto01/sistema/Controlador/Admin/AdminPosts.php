<?php
namespace Sistema\Controlador\Admin;

use Sistema\Modelo\PostModelo;
use Sistema\Modelo\CategoriaModelo;
use Sistema\Nucleo\Funcoes;

class AdminPosts extends AdminControlador{

    public function listar():void
    {
        echo $this->template->renderizar('posts/listar.html',[
            'posts' => (new PostModelo())-> busca()
        ]);

    }
    public function cadastrar():void
    {
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(isset($dados)){
            (new PostModelo())->armazenar($dados);
            Funcoes::redirecionar('admin/posts/listar');
        }
        
        echo $this->template->renderizar('posts/formulario.html',[
            'categorias'=>(new CategoriaModelo())->busca()
        ]);
    }

    public function editar(int $id):void
    {
        $post = (new PostModelo())->buscaPorId($id);

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(isset($dados)){
            (new PostModelo())->atualizar($dados,$id);
            Funcoes::redirecionar('admin/posts/listar');
        }
        
        echo $this->template->renderizar('posts/formulario.html',[
            'post' => $post,
            'categorias'=>(new CategoriaModelo())->busca()
        ]);
}
}