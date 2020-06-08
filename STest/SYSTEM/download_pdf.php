<?php
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "gasm";//users

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    die("Conexiune esuata: " . mysqli_connect_error());
}

$filename = "./file.pdf";
$fp = fopen('php://output', 'w');

$judeteToIDJud = array(
    "Alba" => "RO-AB",
    "Arad" => "RO-AR",
    "Arges" => "RO-AG",
    "Bacau" => "RO-BC",
    "Bihor" => "RO-BH",
    "Bistrita-Nasaud" => "RO-BN",
    "Botosani" => "RO-BT",
    "Brasov" => "RO-BV",
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
    "Bucuresti" => "RO-B",
);

$judNrRapoarte = array(
    "RO-AB" => 0,
    "RO-AR" => 0,
    "RO-AG" => 0,
    "RO-BC" => 0,
    "RO-BH" => 0,
    "RO-BN" => 0,
    "RO-BT" => 0,
    "RO-BV" => 0,
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
    "RO-VN" => 0,
    "RO-B" => 0
);
$var = ["Toate judetele care nu apar nu au avut niciun incident de raportare in perioada precizata!"];
fputcsv($fp, $var);
if (isset($_GET['week']) || isset($_GET['date']) || isset($_GET['month'])) {
    if (isset($_GET['week']))  $getMaxRapoarte = "SELECT judetReport, COUNT(*) as nr FROM `report` where week(dateReport) = week('". date('Y-m-d', strtotime($_GET['week']))."') and year(dateReport) = year('". date('Y-m-d', strtotime($_GET['week']))."')  group by judetReport order by nr DESC;";
    else if (isset($_GET['month'])) $getMaxRapoarte = "SELECT judetReport, COUNT(*) as nr FROM `report` where month(dateReport) = month('". date('Y-m-d', strtotime($_GET['month']))."') and year(dateReport) = year('". date('Y-m-d', strtotime($_GET['month']))."')  group by judetReport order by nr DESC;";
    else  $getMaxRapoarte = "SELECT judetReport, COUNT(*) as nr FROM `report` where dateReport = '".$_GET['date']."' group by judetReport order by nr DESC;";
    $result = mysqli_query($conn, $getMaxRapoarte);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $maxRapoarte = $row['nr'];
        $judNrRapoarte[$judeteToIDJud[$row['judetReport']]] = $row['nr'];
        fputcsv($fp, $row + ["(nr de rapoarte)"]);
        while ($row = mysqli_fetch_assoc($result)) {
            $judNrRapoarte[$judeteToIDJud[$row['judetReport']]] = $row['nr'];
            fputcsv($fp, $row + ["(nr de rapoarte)"]);
        }
    }
    fclose($fp);
}
header('Content-Type: text/pdf');
header('Content-Disposition: attachment; filename="./file.pdf"');
exit;
?>