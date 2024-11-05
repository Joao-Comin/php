<?php
namespace Sistema\Controlador\Admin;

use Sistema\Modelo\PostModelo;
use Sistema\Modelo\CategoriaModelo;
use Sistema\Nucleo\Funcoes;

class AdminPosts extends AdminControlador{

    public function listar():void
    {
        $post = new PostModelo();
        echo $this->template->renderizar('posts/listar.html',[
            'posts' => $post-> busca()->ordem('id DESC')->resultado(true),
            'total' => [
                'total'=> $post->total(),
                'ativo' => $post->total('status = 1'),
                'inativo' => $post->total('status = 0')
            ]
        ]);
        
    }
    public function cadastrar():void
    {
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(isset($dados)){
            
            $post= new PostModelo();
            $post->titulo = $dados['titulo'];
            $post->categoria_id = $dados['categoria_id'];
            $post->texto = $dados['texto'];
            $post->status = $dados['status'];

            if($post->salvar()){
                $this->mensagem->sucesso('Post cadastrado com sucesso')->flash();
                Funcoes::redirecionar('admin/posts/listar');
            }

           
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
            $this->mensagem->sucesso('Editado Com Sucesso')->flash();
            Funcoes::redirecionar('admin/posts/listar');
        }
        
        echo $this->template->renderizar('posts/formulario.html',[
            'post' => $post,
            'categorias'=>(new CategoriaModelo())->busca()
        ]);
}
public function deletar(int $id):void
    {
        (new PostModelo())->deletar($id);
            Funcoes::redirecionar('admin/posts/listar');
}
}