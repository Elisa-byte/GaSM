<?php
class User extends Controller
{
    public function accountSettings()
    {
        // $stock = $this->model('Stock');

        $this->view('user/accountSettings', '');
    }

    public function formularCampanie() {
        $this->view('user/formularCampanie', '');
    }

    public function formularRaportare() {
        $this->view('user/formularRaportare', '');
    }


}

?>