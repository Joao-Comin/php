<?php

class Mensagem
{
    private $texto;
    private $css;


    public function renderizar() : string{
        return $this->texto = $this->filtrar("<h1>mensagem de teste");
    }

    private function filtrar(string $mensagem) : string{

        return filter_var(strip_tags($mensagem), FILTER_SANITIZE_SPECIAL_CHARS);
    }
}