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

}