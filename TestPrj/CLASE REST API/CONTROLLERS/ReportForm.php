<?php

class ReportForm extends Controller
{
    public function __construct()
    {
        $this->database = new Database();
        $this->db= $this->database -> connect();
        $this->post = $this->model('PostReportForm',$this->db);
    }

    public function index()
    {
        $this->view('formular_instiintare');
    }

    public function submit_report_form()
    {
        echo 'sunt aici';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //sanitize post data
            echo 'sunt aici';
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'obsIncReport' => trim($_POST['obsIncReport']),
                'recogPersReport' => trim($_POST['recogPersReport']),
                'typeLiReport' => trim($_POST['typeLiReport']),
                'quantityReport' => trim($_POST['quantityReport']),
                'companyReport' => trim($_POST['companyReport']),
                'carTypeReport' => trim($_POST['carTypeReport']),
                'licensePlateReport' => trim($_POST['licensePlateReport']),
                'carModelReport' => trim($_POST['carModelReport']),
                'carColorReport' => trim($_POST['carColorReport']),
                'judetReport' => trim($_POST['judetReport']),
                'localitateReport' => trim($_POST['localitateReport']),
                'streetReport' => trim($_POST['streetReport']),
                'dateReport' => trim($_POST['dateReport']),
                'detailsReport' => trim($_POST['detailsReport']),
                'imageReport' => trim($_POST['imageReport'])

            ];
            print_r($data);

            if (!empty($data['obsIncReport']) &&
                !empty($data['recogPersReport']) &&
                !empty($data['typeLiReport']) &&
                !empty($data['quantityReport']) &&
                !empty($data['judetReport']) &&
                !empty($data['localitateReport']) &&
                !empty($data['streetReport'])
//                !empty($data['dateReport'])
            ) {
                echo 'aici';
                $this->post->obsIncReport = $data['obsIncReport'];
                $this->post->recogPersReporte = $data['recogPersReporte'];
                $this->post->typeLiReport = $data['typeLiReport'];
                $this->post->quantityReport = $data['quantityReport'];
                $this->post->companyReport = $data['companyReport'];
                $this->post->carTypeReport = $data['carTypeReport'];
                $this->post->licensePlateReport = $data['licensePlateReport'];
                $this->post->carModelReport = $data['carModelReport'];
                $this->post->carColorReport = $data['carColorReport'];
                $this->post->judetReport = $data['judetReport'];
                $this->post->localitateReport = $data['localitateReport'];
                $this->post->dateReport = date("d/m/Y");//sau invers Y m d
                $this->post->streetReport = $data['streetReport'];
                $this->post->detailsReport = $data['detailsReport'];
                $this->post->imageReport = $data['imageReport'];


                if ($this->post->insert()) {
                    echo json_encode(
                        array('message' => 'ReportForm Created')
                    );
                } else {
                    echo json_encode(
                        array('message' => 'ReportForm Not Created')
                    );
                }
            }
        }
    }
}