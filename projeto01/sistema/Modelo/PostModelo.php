<?php

namespace Sistema\Modelo;

use Sistema\Nucleo\Conexao;
class PostModelo
{
 
     public function ler(int $id = null): array
     {
        $where = ($id ? "WHERE id = {$id}":"");
        
        $query = "SELECT * FROM posts {$where}";
        $stmt = Conexao::getInstancia()->query($query);
        $resultado = $stmt->fetchAll();

        return $resultado;
     }
 
}