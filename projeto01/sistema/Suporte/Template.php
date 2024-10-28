<?php

namespace Sistema\Suporte;

use Sistema\Nucleo\Funcoes;
use Twig\Lexer;

class Template
{
    private \Twig\Environment $twig;

    public function __construct(string $diretorio)
    {
        $loader = new \Twig\Loader\FilesystemLoader($diretorio);
        $this->twig = new \Twig\Environment($loader);

        $lexer = new Lexer($this->twig, array(
            $this->helpers()
        ));
        $this->twig->setLexer($lexer);
    }

    public function renderizar(string $view, array $dados):string 
    {
        return $this->twig->render($view, $dados);
    }

    private function helpers():void
    {
        array(
            $this->twig->addFunction
            (new \Twig\TwigFunction('url', function(string $url = null){
                
                return Funcoes::url($url);

            } )
        ),
        $this->twig->addFunction(
            new \Twig\TwigFunction('saudacao', function(){
            
                return Funcoes::saudacao();
            }
        )
        ),
        $this->twig->addFunction(
            new \Twig\TwigFunction('resumirTexto', function(string $texto, int $limite){
            
                return Funcoes::resumirTexto($texto,$limite);
            }
        )
        ),






    );
    }
}