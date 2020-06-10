<?php

class PostReportForm
{
    private $conn;
    private $table = 'report';
    public $obsIncReport;
    public $recogPersReport;
    public $typeLiReport;
    public $quantityReport;
    public $companyReport;
    public $carTypeReport;
    public $licensePlateReport;
    public $carModelReport;
    public $carColorReport;
    public $judetReport;
    public $localitateReport;
    public $streetReport;
    public $dateReport;
    public $detailsReport;
    public $imageReport;

    //constructor with db
    public function __construct($db){
        $this->conn=$db;
    }
    //get post
    public function insert()
    {
        //create query
        $query = 'INSERT INTO ' . $this->table . '
        SET
            obsIncReport=:obsIncReport,
            recogPersReport=:recogPersReport,
            typeLiReport=:typeLiReport,
            quantityReport=:quantityReport,
            companyReport=:companyReport,
            carTypeReport=:carTypeReport,
            licensePlateReport=:licensePlateReport,
            carModelReport=:carModelReport,
            carColorReport=:carColorReport,
            judetReport=:judetReport,
            localitateReport=:localitateReport,
            streetReport=:streetReport,
            dateReport=:date,
            detailsReport=:detailsReport,
            imageReport=:imageReport'
        ;
        //prepared statement
        $pstmt = $this->conn->prepare($query);

        //clean data
        $this->obsIncReport = htmlspecialchars(strip_tags($this->obsIncReport));
        $this->recogPersReport = htmlspecialchars(strip_tags($this->recogPersReport));
        $this->typeLiReport= htmlspecialchars(strip_tags($this->typeLiReport));
        $this->quantityReport = htmlspecialchars(strip_tags($this->quantityReport));
        $this->companyReport = htmlspecialchars(strip_tags($this->companyReport));
        $this->carTypeReport = htmlspecialchars(strip_tags($this->carTypeReport));
        $this->licensePlateReport = htmlspecialchars(strip_tags($this->licensePlateReport));
        $this->carModelReport = htmlspecialchars(strip_tags($this->carModelReport));
        $this->carColorReport = htmlspecialchars(strip_tags($this->carColorReport));
        $this->judetReport = htmlspecialchars(strip_tags($this->judetReport));
        $this->localitateReport = htmlspecialchars(strip_tags($this->localitateReport));
        $this->streetReport = htmlspecialchars(strip_tags($this->streetReport));
        $this->dateReport = htmlspecialchars(strip_tags($this->dateReport));
        $this->detailsReport = htmlspecialchars(strip_tags($this->detailsReport));
        $this->imageReport = htmlspecialchars(strip_tags($this->imageReport));

        //bind parameters
        $pstmt->bindParam(':obsIncReport',$this->obsIncReport);
        $pstmt->bindParam(':recogPersReport',$this->recogPersReport);
        $pstmt->bindParam(':typeLiReport',$this->typeLiReport);
        $pstmt->bindParam(':quantityReport',$this->quantityReport);
        $pstmt->bindParam(':companyReport',$this->companyReport);
        $pstmt->bindParam(':carTypeReport',$this->carTypeReport);
        $pstmt->bindParam(':licensePlateReport',$this->licensePlateReport);
        $pstmt->bindParam(':carModelReport',$this->carModelReport);
        $pstmt->bindParam(':carColorReport',$this->carColorReport);
        $pstmt->bindParam(':judetReport',$this->judetReport);
        $pstmt->bindParam(':localitateReport',$this->localitateReport);
        $pstmt->bindParam(':streetReport',$this->streetReport);
        $pstmt->bindParam(':dateReport',$this->dateReport);
        $pstmt->bindParam(':detailsReport',$this->detailsReport);
        $pstmt->bindParam(':imageReport',$this->imageReport);
        //execute query
        if($pstmt->execute()){
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n",$pstmt->error);
        return false;
    }

    public function read($time,$place)
    {
        if(strcasecmp($time,"day")==0){
            $nr = 1;
        }elseif(strcasecmp($time,"week")==0){
            $nr = 7;
        }else{
            $nr = 30;
        }

        if(strcasecmp($place, "judetReport")==0){
            $query = 'SELECT city, 
            sum(trash) as quantity FROM ' . $this->table . ' where datediff(current_date,notice_date) <= :nr group by judetReport';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":nr",$nr);
            //execute

            $stmt->execute();
            return $stmt;
        }elseif (strcasecmp($place, "neighborhood")==0) {
            $query = 'SELECT localitateReport, judetReport, 
            sum(trash) as quantity FROM ' . $this->table . ' where datediff(current_date,notice_date) <= :nr group by localitateReport,judetReport' ;
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":nr",$nr);
            //execute
            $stmt->execute();
            return $stmt;
        }

    }
}