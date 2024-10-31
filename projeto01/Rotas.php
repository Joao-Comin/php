<?php

use Pecee\SimpleRouter\SimpleRouter;
use Sistema\Nucleo\Funcoes;

try {
    SimpleRouter::setDefaultNamespace("Sistema\Controlador");

SimpleRouter::get(URL_SITE, 'SiteControlador@index');
SimpleRouter::get(URL_SITE.'sobre','SiteControlador@sobre');
SimpleRouter::get(URL_SITE.'post/{id}','SiteControlador@post');
SimpleRouter::get(URL_SITE.'categoria/{id}','SiteControlador@categoria');
SimpleRouter::post(URL_SITE.'buscar','SiteControlador@buscar');


SimpleRouter::get(URL_SITE.'404','SiteControlador@erro404');

SimpleRouter::group(['namespace' => 'Admin'], function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    SimpleRouter::get(URL_ADMIN.'dashbord','AdminDashbord@dashbord');
});


SimpleRouter::start();
} catch (Pecee\SimpleRouter\Exceptions\NotFoundHttpException $ex) {
    if(Funcoes::localhost()) {
        echo $ex;
}else{
    Funcoes::redirecionar('404');
}


}