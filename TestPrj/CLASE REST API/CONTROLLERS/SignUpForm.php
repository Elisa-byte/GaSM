<?php


class SignUpForm
{
    public function __construct()
    {
        $this->database = new Database();
        $this->db= $this->database -> connect();
        $this->post = $this->model('PostSignUpForm',$this->db);
    }
    public function index()
    {
        $this->view('signup');
    }
    
    public function signup_form_submit()
    {
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            //sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'uidUsers' => trim($_POST['uidUsers']),
                'fnUsers' => trim($_POST['fnUsers']),
                'lnUsers' => trim($_POST['lnUsers']),
                'phnUsers' => trim($_POST['phnUsers']),
                'categoryUsers' => trim($_POST['categoryUsers']),
                'emailUsers' => trim($_POST['emailUsers']),
                'locationUsers' => trim($_POST['locationUsers']),
                'profileUsers' => trim($_POST['profileUsers']),
                'pwdUsers' => trim($_POST['pwdUsers']),
            ];
            print_r($data);

            if( !empty($data['uidUsers']) &&
                !empty($data['fnUsers']) &&
                !empty($data['lnUsers']) &&
                !empty($data['emailUsers']) &&
                !empty($data['phnUsers']) &&
                !empty($data['locationUsers']) &&
                !empty($data['categoryUsers']) &&
                !empty($data['profileUsers']) &&
                !empty($data['pwdUsers'])
            ){
                echo 'aici';

                $this->post->uidUsers = $data['uidUsers'];
                $this->post->fnUsers= $data['fnUsers'];
                $this->post->lnUsers= $data['lnUsers'];
                $this->post->phnUsers= $data['phnUsers'];
                $this->post->categoryUsers=$data['categoryUsers'];
                $this->post->emailUsers= $data['emailUsers'];
                $this->post->locationUsers=$data['locationUsers'];
                $this->post->locationUsers=$data['profileUsers'];
                $this->post->password= $data['pwdUsers'];


                if($this->post->insert()){
                    echo json_encode(
                        array('message'=>'PostSignUpForm Created')
                    );
                }else{
                    echo json_encode(
                        array('message'=>'PostSignUpForm Not Created')
                    );
                }
            }
        }
    }
}