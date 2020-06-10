<?php
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

$judete = [
    "Alba",
    "Arad",
    "Arges",
    "Bacau",
    "Bihor",
    "Bistrita-Nasaud",
    "Botosani",
    "Brasov",
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
    "Bucuresti",
];

sort($judete);

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
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>HTML Table With PHP</title>
        <style>
        .columns
        {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }
        #report {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
        }

        #report td, #report th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #report tr:nth-child(even){background-color: #f2f2f2;}

        #report tr:hover {background-color: #ddd;}

        #report th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
        </style>
    </head>
    <body>
    <div class="columns">
    <!-- <div style="overflow-x:auto;"> -->
        <table id="report">
            
            <tr>
                <th>Judet</th>
                <th>Nr.de raportari</th>
            </tr>
            <tr>
            <?php for ($k = 0; $k < count($judete); $k++): ?>
                <td><?php echo $judete[$k]; ?></td>
                <td><?php echo $judNrRapoarte[$judeteToIDJud[$judete[$k]]]; ?></td>
                <tr>
            <?php endfor; ?>
            </tr>
        </table>
    <!-- </div> -->
    
    <div id="piechart"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Judete', 'Nr. de rapoarte'],
                <?php for ($k = 0; $k < count($judete); $k++): ?>
                    ['<?php echo $judete[$k]; ?>', parseInt('<?php echo $judNrRapoarte[$judeteToIDJud[$judete[$k]]]; ?>')],
                <?php endfor; ?>
            ['Var', 0]
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = { 'title':'','width': 750, 'height': 600};

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
    </script>
    </div>
    <!-- <a href="index.php" download="w3logo">Download</a> -->
    </body>
</html>