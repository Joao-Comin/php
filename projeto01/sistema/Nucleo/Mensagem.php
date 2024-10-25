<?php

namespace projeto01\sistema\Nucleo;

/**
 * Classe responsavel por exibir mensagens do sistema
 * @author Joao Victor Comin <joaovictorcomin2005@gmail.com>
 * @copyright 2024 cooperja
 * 
 */
class Mensagem
{
    private $texto;
    private $css;

    public function sucesso(string $mensagem): Mensagem
    {
        $this->css = 'alert alert-success';
        $this->texto = $this->filtrar($mensagem);
        return $this;
    }

    public function erro(string $mensagem): Mensagem
    {
        $this->css = 'alert alert-danger';
        $this-> texto = $this->filtrar($mensagem);
        return $this;
    }
    public function renderizar() : string{
        return "<div class='{$this->css}'>{$this->texto}</div>";
    }

    private function filtrar(string $mensagem) : string{

        return filter_var(strip_tags($mensagem), FILTER_SANITIZE_SPECIAL_CHARS);
    }
    public function __toString()
    {
        return $this->renderizar();
    }
}