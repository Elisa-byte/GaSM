<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- <base href="<?php echo $base_location ?>" /> -->
    <link rel="stylesheet" href="./styles.css">
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/maps.js"></script>
    <script src="https://www.amcharts.com/lib/4/geodata/usaLow.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="https://www.amcharts.com/lib/4/geodata/romaniaLow.js"></script>
    <style>
        #chartdiv {
            width: 100%;
            height: 500px
        }
    </style>
</head>

<body>
    <?php require_once 'C:\xampp\htdocs\GaSM\exempluProf\app\views\includes\topnav.php' ?>

    <main class="main-content" id="main-cont">

        <?php
        require "includes/dbh.inc.php";
        $query = "select min(dateReport) from report;";
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_row();
        $value = $row[0];
        ?>

        <h2 class="center-text">Situația României în ceea ce privește poluarea</h2>
        <span class="center-text">Vezi situația pe </span>
        <form class="tmp" method="GET">

            <!-- <span>Username</span> -->
            <div>
                <label for="week1">Săptămână</label>
                <input type="week" name="week" min="<?php echo date("Y-\WW", strtotime($value))?>" id="week1">
            </div>
            <div>
                <label for="week1">Lună</label>
                <input type="month" name="month" min="<?php echo date("Y-m", strtotime($value))?>" id="month1">
            </div>
            <div>
                <label for="week1">sau Zi</label>
                <input type="date" name="date" min="<?php echo $value?>" id="date1">
            </div>

            <script>
                var inp1 = document.getElementById("week1");
                inp1.oninput = function() {
                    document.getElementById("month1").disabled = this.value != "";
                    document.getElementById("date1").disabled = this.value != "";
                };

                var inp2 = document.getElementById("month1");
                inp2.oninput = function() {
                    document.getElementById("week1").disabled = this.value != "";
                    document.getElementById("date1").disabled = this.value != "";
                };

                var inp3 = document.getElementById("date1");
                inp3.oninput = function() {
                    document.getElementById("month1").disabled = this.value != "";
                    document.getElementById("week1").disabled = this.value != "";
                };
            </script>
            <button class="shadow-button button-clear" type="button" onclick="document.getElementById('week1').value = '';
                                           document.getElementById('week1').disabled = false;
                                           document.getElementById('month1').value = '';
                                           document.getElementById('month1').disabled = false;
                                           document.getElementById('date1').value = '';
                                           document.getElementById('date1').disabled = false;">Clear</button>
            <button class="shadow-button" type="submit">Go</button>
        </form>
        <!-- Styles -->

        <?php

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
            // foreach ($judNrRapoarte as $id => $nr) {
            //     echo "cheie $id nr rapoarte $nr\n";
            // }
    
            mysqli_close($conn);
        }
        ?>

        <!-- Resources -->


        <!-- Chart code -->
        <script>
            am4core.ready(function() {

                // Themes begin
                am4core.useTheme(am4themes_animated);
                // Themes end

                // Create map instance
                var chart = am4core.create("chartdiv", am4maps.MapChart);

                // Set map definition
                // chart.geodata = am4geodata_usaLow;
                chart.geodata = am4geodata_romaniaLow;

                // Set projection
                chart.projection = new am4maps.projections.Projection;

                // Create map polygon series
                var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());

                //Set min/max fill color for each area
                polygonSeries.heatRules.push({
                    property: "fill",
                    target: polygonSeries.mapPolygons.template,
                    min: am4core.color("#34905c"),
                    max: am4core.color("#330501"),
                    // min: chart.colors.getIndex(100).brighten(1),
                    // max: chart.colors.getIndex(100).brighten(-0.3)
                });

                // Make map load polygon data (state shapes and names) from GeoJSON
                polygonSeries.useGeodata = true;

                // Set heatmap values for each state
                polygonSeries.data = [{
                        id: "RO-AB",
                        value: <?php echo $judNrRapoarte['RO-AB'] ?>
                    },
                    {
                        id: "RO-AR",
                        value: <?php echo $judNrRapoarte['RO-AR'] ?>
                    },
                    {
                        id: "RO-AG",
                        value: <?php echo $judNrRapoarte['RO-AG'] ?>
                    },
                    {
                        id: "RO-BC",
                        value: <?php echo $judNrRapoarte['RO-BC'] ?>
                    },
                    {
                        id: "RO-BH",
                        value: <?php echo $judNrRapoarte['RO-BH'] ?>
                    },
                    {
                        id: "RO-BN",
                        value: <?php echo $judNrRapoarte['RO-BN'] ?>
                    },
                    {
                        id: "RO-BT",
                        value: <?php echo $judNrRapoarte['RO-BT'] ?>
                    },
                    {
                        id: "RO-BV",
                        value: <?php echo $judNrRapoarte['RO-BV'] ?>
                    },
                    {
                        id: "RO-BR",
                        value: <?php echo $judNrRapoarte['RO-BR'] ?>
                    },
                    {
                        id: "RO-BZ",
                        value: <?php echo $judNrRapoarte['RO-BZ'] ?>
                    },
                    {
                        id: "RO-CS",
                        value: <?php echo $judNrRapoarte['RO-CS'] ?>
                    },
                    {
                        id: "RO-CL",
                        value: <?php echo $judNrRapoarte['RO-CL'] ?>
                    },
                    {
                        id: "RO-CJ",
                        value: <?php echo $judNrRapoarte['RO-CJ'] ?>
                    },
                    {
                        id: "RO-CT",
                        value: <?php echo $judNrRapoarte['RO-CT'] ?>
                    },
                    {
                        id: "RO-CV",
                        value: <?php echo $judNrRapoarte['RO-CV'] ?>
                    },
                    {
                        id: "RO-DB",
                        value: <?php echo $judNrRapoarte['RO-DB'] ?>
                    },
                    {
                        id: "RO-DJ",
                        value: <?php echo $judNrRapoarte['RO-DJ'] ?>
                    },
                    {
                        id: "RO-GL",
                        value: <?php echo $judNrRapoarte['RO-GL'] ?>
                    },
                    {
                        id: "RO-GR",
                        value: <?php echo $judNrRapoarte['RO-GR'] ?>
                    },
                    {
                        id: "RO-GJ",
                        value: <?php echo $judNrRapoarte['RO-GJ'] ?>
                    },
                    {
                        id: "RO-HR",
                        value: <?php echo $judNrRapoarte['RO-HR'] ?>
                    },
                    {
                        id: "RO-HD",
                        value: <?php echo $judNrRapoarte['RO-HD'] ?>
                    },
                    {
                        id: "RO-IL",
                        value: <?php echo $judNrRapoarte['RO-IL'] ?>
                    },
                    {
                        id: "RO-IS",
                        value: <?php echo $judNrRapoarte['RO-IS'] ?>
                    },
                    {
                        id: "RO-IF",
                        value: <?php echo $judNrRapoarte['RO-IF'] ?>
                    },
                    {
                        id: "RO-MM",
                        value: <?php echo $judNrRapoarte['RO-MM'] ?>
                    },
                    {
                        id: "RO-MH",
                        value: <?php echo $judNrRapoarte['RO-MH'] ?>
                    },
                    {
                        id: "RO-MS",
                        value: <?php echo $judNrRapoarte['RO-MS'] ?>
                    },
                    {
                        id: "RO-NT",
                        value: <?php echo $judNrRapoarte['RO-NT'] ?>
                    },
                    {
                        id: "RO-OT",
                        value: <?php echo $judNrRapoarte['RO-OT'] ?>
                    },
                    {
                        id: "RO-PH",
                        value: <?php echo $judNrRapoarte['RO-PH'] ?>
                    },
                    {
                        id: "RO-SM",
                        value: <?php echo $judNrRapoarte['RO-SM'] ?>
                    },
                    {
                        id: "RO-SJ",
                        value: <?php echo $judNrRapoarte['RO-SJ'] ?>
                    },
                    {
                        id: "RO-SB",
                        value: <?php echo $judNrRapoarte['RO-SB'] ?>
                    },
                    {
                        id: "RO-SV",
                        value: <?php echo $judNrRapoarte['RO-SV'] ?>
                    },
                    {
                        id: "RO-TR",
                        value: <?php echo $judNrRapoarte['RO-TR'] ?>
                    },
                    {
                        id: "RO-TM",
                        value: <?php echo $judNrRapoarte['RO-TM'] ?>
                    },
                    {
                        id: "RO-TL",
                        value: <?php echo $judNrRapoarte['RO-TL'] ?>
                    },
                    {
                        id: "RO-VS",
                        value: <?php echo $judNrRapoarte['RO-VS'] ?>
                    },
                    {
                        id: "RO-VL",
                        value: <?php echo $judNrRapoarte['RO-VL'] ?>
                    },
                    {
                        id: "RO-VN",
                        value: <?php echo $judNrRapoarte['RO-VN'] ?>
                    },
                    {
                        id: "RO-B",
                        value: <?php echo $judNrRapoarte['RO-B'] ?>
                    },
                    {
                        id: "RO-IDB",
                        value: 10
                    }
                ];

                // Set up heat legend
                let heatLegend = chart.createChild(am4maps.HeatLegend);
                heatLegend.series = polygonSeries;
                heatLegend.align = "right";
                heatLegend.valign = "bottom";
                heatLegend.width = am4core.percent(20);
                heatLegend.marginRight = am4core.percent(5);
                heatLegend.minValue = 0;
                heatLegend.maxValue = 100;

                // Set up custom heat map legend labels using axis ranges
                var minRange = heatLegend.valueAxis.axisRanges.create();
                minRange.value = heatLegend.minValue;
                minRange.label.text = "Bun!";
                var maxRange = heatLegend.valueAxis.axisRanges.create();
                maxRange.value = heatLegend.maxValue;
                maxRange.label.text = "Rău :/";

                // Blank out internal heat legend value axis labels
                heatLegend.valueAxis.renderer.labels.template.adapter.add("text", function(labelText) {
                    return "";
                });

                // Configure series tooltip
                var polygonTemplate = polygonSeries.mapPolygons.template;
                polygonTemplate.tooltipText = "{name}: {value}";
                polygonTemplate.nonScalingStroke = true;
                polygonTemplate.strokeWidth = 0.5;

                // Create hover state and set alternative fill color
                var hs = polygonTemplate.states.create("hover");
                hs.properties.fill = am4core.color("#91c4a7");

            }); // end am4core.ready()
        </script>

        <!-- HTML -->
        <div id="chartdiv"></div>
    </main>
    <div class="download-buttons">
    <a href="<?php
                if(isset($_GET['week']))
                {
                    $week = $_GET['week'];
                    $link="download_csv.php?&week=";
                }
                else
                    $week = "";
                if(isset($_GET['month']))
                {
                    $month = $_GET['month'];
                    $link="download_csv.php?&month=";
                }
                else
                    $month = "";
                if(isset($_GET['day']))
                {
                    $week = $_GET['day'];
                    $link="download_csv.php?&day=";
                }
                else
                    $day = "";
                echo $link;
                echo $week;
                echo $month;
                echo $day;
            ?>"  class="shadow-button">Download Statistics(CSV)</a>
    <a href="<?php
                if(isset($_GET['week']))
                {
                    $week = $_GET['week'];
                    $link="download_pdf.php?&week=";
                }
                else
                    $week = "";
                if(isset($_GET['month']))
                {
                    $month = $_GET['month'];
                    $link="download_pdf.php?&month=";
                }
                else
                    $month = "";
                if(isset($_GET['day']))
                {
                    $week = $_GET['day'];
                    $link="download_pdf.php?&day=";
                }
                else
                    $day = "";
                echo $link;
                echo $week;
                echo $month;
                echo $day;
            ?>"  class="shadow-button">Download Statistics(PDF)</a>
    <a href="<?php
                if(isset($_GET['week']))
                {
                    $week = $_GET['week'];
                    $link="download_html.php?&week=";
                }
                else
                    $week = "";
                if(isset($_GET['month']))
                {
                    $month = $_GET['month'];
                    $link="download_html.php?&month=";
                }
                else
                    $month = "";
                if(isset($_GET['day']))
                {
                    $week = $_GET['day'];
                    $link="download_html.php?&day=";
                }
                else
                    $day = "";
                echo $link;
                echo $week;
                echo $month;
                echo $day;
            ?>"  class="shadow-button" download="report.html">Download Statistics(HTML)</a>
    </div>
    <?php require_once 'C:\xampp\htdocs\GaSM\exempluProf\app\views\includes\footer.php' ?>

</body>

</html>