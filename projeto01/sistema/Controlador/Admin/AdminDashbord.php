<?php
namespace Sistema\Controlador\Admin;


class AdminDashbord extends AdminControlador{

    public function dashbord():void
    {
        echo $this->template->renderizar('dashbord.html',[]);

    }
}