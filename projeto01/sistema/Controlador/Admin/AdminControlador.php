<?php

namespace Sistema\Controlador\Admin;

use Sistema\Modelo\CategoriaModelo;
use Sistema\Nucleo\Controlador;

class AdminControlador extends Controlador
{
    public function __construct(){

        parent::__construct('Templates/admin/Views');
    }

    public function editar(int $id):void
    {
        $categoria = (new CategoriaModelo())->buscaPorId($id);
        
        echo $this->template->renderizar('categorias/formulario.html',[
            'categoria' => $categoria
        ]);
}

}