<?php

class LoginForm extends Controller
{
    public function __construct()
    {
        $this->database = new Database();
        $this->db= $this->database -> connect();
        $this->post = $this->model('PostLoginForm',$this->db);
    }

    public function index()
    {
        $this->view('login');
    }

    public function login_form_submit()
    {
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            //sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'uidmail' => trim($_POST['uidmail']),
                'password' => trim($_POST['password']),
            ];
            print_r($data);

            if(
                !empty($data['uidmail']) &&
                !empty($data['password'])
            ){
                echo 'aici';
                $this->post->username= $data['uidmail'];
                $this->post->password= $data['password'];
                if($this->post->select()){
                    echo json_encode(
                        array('message'=>'PostLoginForm Created')
                    );
                }else{
                    echo json_encode(
                        array('message'=>'PostLoginForm Not Created')
                    );
                }
            }
        }
    }
}
