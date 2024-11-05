<?php

namespace Sistema\Modelo;

use Sistema\Nucleo\Conexao;
use Sistema\Nucleo\Modelo;

class PostModelo extends Modelo
{
      public function __construct()
      {
         parent::__construct('posts');
      }

     public function pesquisa(string $busca): array
     {
        
        $query = "SELECT * FROM posts WHERE status = 1 AND titulo LIKE '%{$busca}%'";
        $stmt = Conexao::getInstancia()->query($query);
        $resultado = $stmt->fetchAll();

        return $resultado;
     }

     public function deletar(int $id):void
     {
      $query = "DELETE FROM posts WHERE id = {$id}";
      $stmt = Conexao::getInstancia()->prepare($query);
      $stmt->execute();
     }

 
}