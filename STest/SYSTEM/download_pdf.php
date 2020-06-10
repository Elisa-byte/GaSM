<?php
require "includes/pdf_inc/diag.php";
require "includes/dbh.inc.php";

$judeteToIDJud = array(
    "Alba" => "RO-AB",
    "Arad" => "RO-AR",
    "Arges" => "RO-AG",
    "Bacau" => "RO-BC",
    "Bihor" => "RO-BH",
    "Bistrita-Nasaud" => "RO-BN",
    "Botosani" => "RO-BT",
    "Brasov" => "RO-BV",
    "Bucuresti" => "RO-B",
    "Braila" => "RO-BR",
    "Buzau" => "RO-BZ",
    "Caras-Severin" => "RO-CS",
    "Calarasi" => "RO-CL",
    "Cluj" => "RO-CJ",
    "Constanta" => "RO-CT",
    "Covasna" => "RO-CV",
    "Dambovita" => "RO-DB",
    "Dolj" => "RO-DJ",
    "Galati" => "RO-GL",
    "Giurgiu" => "RO-GR",
    "Gorj" => "RO-GJ",
    "Harghita" => "RO-HR",
    "Hunedoara" => "RO-HD",
    "Ialomita" => "RO-IL",
    "Iasi" => "RO-IS",
    "Ilfov" => "RO-IF",
    "Maramures" => "RO-MM",
    "Mehedinti" => "RO-MH",
    "Mures" => "RO-MS",
    "Neamt" => "RO-NT",
    "Olt" => "RO-OT",
    "Prahova" => "RO-PH",
    "Satu Mare" => "RO-SM",
    "Salaj" => "RO-SJ",
    "Sibiu" => "RO-SB",
    "Suceava" => "RO-SV",
    "Teleorman" => "RO-TR",
    "Timis" => "RO-TM",
    "Tulcea" => "RO-TL",
    "Vaslui" => "RO-VS",
    "Valcea" => "RO-VL",
    "Vrancea" => "RO-VN",
);

$judete = [
    "Alba",
    "Arad",
    "Arges",
    "Bacau",
    "Bihor",
    "Bistrita-Nasaud",
    "Botosani",
    "Brasov",
    "Bucuresti",
    "Braila",
    "Buzau",
    "Caras-Severin",
    "Calarasi",
    "Cluj",
    "Constanta",
    "Covasna",
    "Dambovita",
    "Dolj",
    "Galati",
    "Giurgiu",
    "Gorj",
    "Harghita",
    "Hunedoara",
    "Ialomita",
    "Iasi",
    "Ilfov",
    "Maramures",
    "Mehedinti",
    "Mures",
    "Neamt",
    "Olt",
    "Prahova",
    "Satu Mare",
    "Salaj",
    "Sibiu",
    "Suceava",
    "Teleorman",
    "Timis",
    "Tulcea",
    "Vaslui",
    "Valcea",
    "Vrancea",
];


$judNrRapoarte = array(
    "RO-AB" => 0,
    "RO-AR" => 0,
    "RO-AG" => 0,
    "RO-BC" => 0,
    "RO-BH" => 0,
    "RO-BN" => 0,
    "RO-BT" => 0,
    "RO-BV" => 0,
    "RO-B" => 0,
    "RO-BR" => 0,
    "RO-BZ" => 0,
    "RO-CS" => 0,
    "RO-CL" => 0,
    "RO-CJ" => 0,
    "RO-CT" => 0,
    "RO-CV" => 0,
    "RO-DB" => 0,
    "RO-DJ" => 0,
    "RO-GL" => 0,
    "RO-GR" => 0,
    "RO-GJ" => 0,
    "RO-HR" => 0,
    "RO-HD" => 0,
    "RO-IL" => 0,
    "RO-IS" => 0,
    "RO-IF" => 0,
    "RO-MM" => 0,
    "RO-MH" => 0,
    "RO-MS" => 0,
    "RO-NT" => 0,
    "RO-OT" => 0,
    "RO-PH" => 0,
    "RO-SM" => 0,
    "RO-SJ" => 0,
    "RO-SB" => 0,
    "RO-SV" => 0,
    "RO-TR" => 0,
    "RO-TM" => 0,
    "RO-TL" => 0,
    "RO-VS" => 0,
    "RO-VL" => 0,
    "RO-VN" => 0
);


$pdf = new PDF_Diag();
$pdf->AddPage();
$valX = $pdf->GetX();
$valY = $pdf->GetY();

if (isset($_GET['week']) || isset($_GET['date']) || isset($_GET['month'])) {
    if (isset($_GET['week']))  $getMaxRapoarte = "SELECT judetReport, COUNT(*) as nr FROM `report` where week(dateReport) = week('". date('Y-m-d', strtotime($_GET['week']))."') and year(dateReport) = year('". date('Y-m-d', strtotime($_GET['week']))."')  group by judetReport order by nr DESC;";
    else if (isset($_GET['month'])) $getMaxRapoarte = "SELECT judetReport, COUNT(*) as nr FROM `report` where month(dateReport) = month('". date('Y-m-d', strtotime($_GET['month']))."') and year(dateReport) = year('". date('Y-m-d', strtotime($_GET['month']))."')  group by judetReport order by nr DESC;";
    else  $getMaxRapoarte = "SELECT judetReport, COUNT(*) as nr FROM `report` where dateReport = '".$_GET['date']."' group by judetReport order by nr DESC;";
    $result = mysqli_query($conn, $getMaxRapoarte);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $maxRapoarte = $row['nr'];
        $judNrRapoarte[$judeteToIDJud[$row['judetReport']]] = $row['nr'];
        while ($row = mysqli_fetch_assoc($result)) {
            $judNrRapoarte[$judeteToIDJud[$row['judetReport']]] = $row['nr'];
        }
    }
}

//Bar diagram
$pdf->SetFont('Arial', 'BIU', 12);
$pdf->Cell(0, 5, 'Statistics report', 0, 1);
$pdf->Ln(8);
$valX = $pdf->GetX();
$valY = $pdf->GetY();
$pdf->BarDiagram(190, 260, array_combine($judete,array_combine($judeteToIDJud, $judNrRapoarte)), '%l : %v (%p)', array(255,175,100));
$pdf->SetXY($valX, $valY + 80);

$pdf->Output();
header('Content-Type: text/pdf');
header('Content-Disposition: attachment; filename="./file.pdf"');
exit;
?>