<?php
namespace Sistema\Controlador\Admin;

use Sistema\Modelo\CategoriaModelo;

class AdminCategorias extends AdminControlador{

    public function listar():void
    {
        echo $this->template->renderizar('categorias/listar.html',[
            'categorias' => (new CategoriaModelo())-> busca()
        ]);

    }
    public function cadastrar():void
    {
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(isset($dados)){

        }
        
        echo $this->template->renderizar('categorias/formulario.html',[]);

    }
    
}