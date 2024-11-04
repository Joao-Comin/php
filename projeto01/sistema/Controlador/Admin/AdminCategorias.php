<?php
namespace Sistema\Controlador\Admin;

use Sistema\Modelo\CategoriaModelo;
use Sistema\Nucleo\Funcoes;

class AdminCategorias extends AdminControlador{

    public function listar():void
    {
        $categoria = new CategoriaModelo();
        echo $this->template->renderizar('categorias/listar.html',[
            'categorias' => $categoria-> busca(),
            'total' => [
                'total'=> $categoria->total(),
                'ativo' => $categoria->total('status = 1'),
                'inativo' => $categoria->total('status = 0')
            ]
        ]);
    }
    public function cadastrar():void
    {
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(isset($dados)){
            (new CategoriaModelo())->armazenar($dados);
            Funcoes::redirecionar('admin/categorias/listar');
        }
        
        echo $this->template->renderizar('categorias/formulario.html',[]);

    }
    public function editar(int $id):void
    {
        $categoria = (new CategoriaModelo())->buscaPorId($id);

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(isset($dados)){
            (new CategoriaModelo())->atualizar($dados, $id);
            Funcoes::redirecionar('admin/categorias/listar');
        }
        
        echo $this->template->renderizar('categorias/formulario.html',[
            'categoria' => $categoria
        ]);
}
public function deletar(int $id):void
    {
        (new CategoriaModelo())->deletar($id);
        Funcoes::redirecionar('admin/categorias/listar');
    
}
}