<?php

//localhost link: http://localhost:8081/projeto01/index.php
require __DIR__ . '/vendor/autoload.php';

//require 'Rotas.php';
use Sistema\Modelo\PostModelo;

$posts = (new PostModelo())->ler();
foreach($posts as $post){
    echo $post->titulo.'<br>';
}

