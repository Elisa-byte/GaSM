<?php
class Home extends Controller
{
    public function index()
    {
        $stock = $this->model('Stock');

        $this->view('home/index', ["stock" => $stock -> products]);
    }

    public function login($smth = '') {
        $this->view('home/login', '');
    }

    public function signup($smth = '') {
        $this->view('home/signup', '');
    }

    public function statistics($smth = '') {
        $this->view('home/statistics', '');
    }

}

?>
