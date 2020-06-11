<?php
class Controller
{
    public function model($model, $params = []) {
        require_once __DIR__ . '/../models/'. $model .'.model.php';

        $modelClass = $model . 'Model';
        return new $modelClass($params);
    }

    public function view($view, $data) {
        $base_location = "http://localhost/gasm/";
        // if(!isset($_SESSION)) 
        // { 
        //     session_start(); 
        // } 
        // require_once "app/config/dbh.inc.php";
        require_once __DIR__ . '/../views/' . $view . '.php';
    }
}
