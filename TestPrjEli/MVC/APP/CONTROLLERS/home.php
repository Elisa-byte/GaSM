<?php
/* * The default home controller, called when no controller/method has been passed to the application. */
require_once ('..MVC/APP/CORE/Controller.php');

class Home {

    /*** The default controller method.* @return void */

    public function index($name = 'alex' , $mood='happy'){
        $user = $this->model('User');
        $user->name = $name;
        $this->view('VIEWS/home/index', ['name'=> $user->name, 'mood'=> $mood]);
    }

    public function test(){
        echo 'Test';
    }
}