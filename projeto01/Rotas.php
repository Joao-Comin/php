<?php

use Pecee\SimpleRouter\SimpleRouter;
use Sistema\Nucleo\Funcoes;

try {
    SimpleRouter::setDefaultNamespace("Sistema\Controlador");

SimpleRouter::get(URL_SITE, 'SiteControlador@index');
SimpleRouter::get(URL_SITE.'sobre','SiteControlador@sobre');
SimpleRouter::get(URL_SITE.'404','SiteControlador@erro404');

SimpleRouter::start();
} catch (Pecee\SimpleRouter\Exceptions\NotFoundHttpException $ex) {
    if(Funcoes::localhost()) {
        echo $ex;
}else{
    Funcoes::redirecionar('404');
}
}