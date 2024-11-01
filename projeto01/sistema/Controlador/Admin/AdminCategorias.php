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
}