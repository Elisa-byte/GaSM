<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistici</title>
    <base href="<?php echo $base_location ?>" />
    <script src="https://use.fontawesome.com/9366a1d005.js"></script>

    <link rel="stylesheet" href="public/stylesheets/styles.css">
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/maps.js"></script>
    <script src="https://www.amcharts.com/lib/4/geodata/usaLow.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="https://www.amcharts.com/lib/4/geodata/romaniaLow.js"></script>
    <script src="public/JavaScript/disableScroll.js"></script>
    <script stc="public/JavaScript/isGetSet.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js" integrity="sha256-Xxq2X+KtazgaGuA2cWR1v3jJsuMJUozyIXDB3e793L8=" crossorigin="anonymous"></script>
    <style>
        #chartdiv {
            width: 100%;
            height: 500px
        }
    </style>
</head>

<body>
    <?php require_once 'app/views/includes/topnav.php' ?>

    <main class="main-content" id="main-cont">

        <h2 class="center-text">Situația României în ceea ce privește poluarea</h2>
        <span class="center-text">Vezi situația pe </span>
        <form class="tmp" method="GET">

            <!-- <span>Username</span> -->
            <div>
                <label for="week1">Săptămână</label>
                <input type="week" name="week" min="<?php echo date("Y-\WW", strtotime($data['value'])) ?>" id="week1">
            </div>
            <div>
                <label for="week1">Lună</label>
                <input type="month" name="month" min="<?php echo date("Y-m", strtotime($data['value'])) ?>" id="month1">
            </div>
            <div>
                <label for="week1">sau Zi</label>
                <input type="date" name="date" min="<?php echo $data['value'] ?>" id="date1">
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
                        value: <?php echo $data['judNrRapoarte']['RO-AB'] ?>
                    },
                    {
                        id: "RO-AR",
                        value: <?php echo $data['judNrRapoarte']['RO-AR'] ?>
                    },
                    {
                        id: "RO-AG",
                        value: <?php echo $data['judNrRapoarte']['RO-AG'] ?>
                    },
                    {
                        id: "RO-BC",
                        value: <?php echo $data['judNrRapoarte']['RO-BC'] ?>
                    },
                    {
                        id: "RO-BH",
                        value: <?php echo $data['judNrRapoarte']['RO-BH'] ?>
                    },
                    {
                        id: "RO-BN",
                        value: <?php echo $data['judNrRapoarte']['RO-BN'] ?>
                    },
                    {
                        id: "RO-BT",
                        value: <?php echo $data['judNrRapoarte']['RO-BT'] ?>
                    },
                    {
                        id: "RO-BV",
                        value: <?php echo $data['judNrRapoarte']['RO-BV'] ?>
                    },
                    {
                        id: "RO-BR",
                        value: <?php echo $data['judNrRapoarte']['RO-BR'] ?>
                    },
                    {
                        id: "RO-BZ",
                        value: <?php echo $data['judNrRapoarte']['RO-BZ'] ?>
                    },
                    {
                        id: "RO-CS",
                        value: <?php echo $data['judNrRapoarte']['RO-CS'] ?>
                    },
                    {
                        id: "RO-CL",
                        value: <?php echo $data['judNrRapoarte']['RO-CL'] ?>
                    },
                    {
                        id: "RO-CJ",
                        value: <?php echo $data['judNrRapoarte']['RO-CJ'] ?>
                    },
                    {
                        id: "RO-CT",
                        value: <?php echo $data['judNrRapoarte']['RO-CT'] ?>
                    },
                    {
                        id: "RO-CV",
                        value: <?php echo $data['judNrRapoarte']['RO-CV'] ?>
                    },
                    {
                        id: "RO-DB",
                        value: <?php echo $data['judNrRapoarte']['RO-DB'] ?>
                    },
                    {
                        id: "RO-DJ",
                        value: <?php echo $data['judNrRapoarte']['RO-DJ'] ?>
                    },
                    {
                        id: "RO-GL",
                        value: <?php echo $data['judNrRapoarte']['RO-GL'] ?>
                    },
                    {
                        id: "RO-GR",
                        value: <?php echo $data['judNrRapoarte']['RO-GR'] ?>
                    },
                    {
                        id: "RO-GJ",
                        value: <?php echo $data['judNrRapoarte']['RO-GJ'] ?>
                    },
                    {
                        id: "RO-HR",
                        value: <?php echo $data['judNrRapoarte']['RO-HR'] ?>
                    },
                    {
                        id: "RO-HD",
                        value: <?php echo $data['judNrRapoarte']['RO-HD'] ?>
                    },
                    {
                        id: "RO-IL",
                        value: <?php echo $data['judNrRapoarte']['RO-IL'] ?>
                    },
                    {
                        id: "RO-IS",
                        value: <?php echo $data['judNrRapoarte']['RO-IS'] ?>
                    },
                    {
                        id: "RO-IF",
                        value: <?php echo $data['judNrRapoarte']['RO-IF'] ?>
                    },
                    {
                        id: "RO-MM",
                        value: <?php echo $data['judNrRapoarte']['RO-MM'] ?>
                    },
                    {
                        id: "RO-MH",
                        value: <?php echo $data['judNrRapoarte']['RO-MH'] ?>
                    },
                    {
                        id: "RO-MS",
                        value: <?php echo $data['judNrRapoarte']['RO-MS'] ?>
                    },
                    {
                        id: "RO-NT",
                        value: <?php echo $data['judNrRapoarte']['RO-NT'] ?>
                    },
                    {
                        id: "RO-OT",
                        value: <?php echo $data['judNrRapoarte']['RO-OT'] ?>
                    },
                    {
                        id: "RO-PH",
                        value: <?php echo $data['judNrRapoarte']['RO-PH'] ?>
                    },
                    {
                        id: "RO-SM",
                        value: <?php echo $data['judNrRapoarte']['RO-SM'] ?>
                    },
                    {
                        id: "RO-SJ",
                        value: <?php echo $data['judNrRapoarte']['RO-SJ'] ?>
                    },
                    {
                        id: "RO-SB",
                        value: <?php echo $data['judNrRapoarte']['RO-SB'] ?>
                    },
                    {
                        id: "RO-SV",
                        value: <?php echo $data['judNrRapoarte']['RO-SV'] ?>
                    },
                    {
                        id: "RO-TR",
                        value: <?php echo $data['judNrRapoarte']['RO-TR'] ?>
                    },
                    {
                        id: "RO-TM",
                        value: <?php echo $data['judNrRapoarte']['RO-TM'] ?>
                    },
                    {
                        id: "RO-TL",
                        value: <?php echo $data['judNrRapoarte']['RO-TL'] ?>
                    },
                    {
                        id: "RO-VS",
                        value: <?php echo $data['judNrRapoarte']['RO-VS'] ?>
                    },
                    {
                        id: "RO-VL",
                        value: <?php echo $data['judNrRapoarte']['RO-VL'] ?>
                    },
                    {
                        id: "RO-VN",
                        value: <?php echo $data['judNrRapoarte']['RO-VN'] ?>
                    },
                    {
                        id: "RO-B",
                        value: <?php echo $data['judNrRapoarte']['RO-B'] ?>
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

        <div class="download-buttons">
            <a href="<?php
                        if (isset($_GET['week'])) {
                            $week = $_GET['week'];
                            $link = "home/download_csv?&week=";
                        } else
                            $week = "";
                        if (isset($_GET['month'])) {
                            $month = $_GET['month'];
                            $link = "home/download_csv?&month=";
                        } else
                            $month = "";
                        if (isset($_GET['day'])) {
                            $week = $_GET['day'];
                            $link = "home/download_csv?&day=";
                        } else
                            $day = "";
                        if (!empty($link)) {
                            echo $link;
                        }
                        if (!empty($week)) {
                            echo $week;
                        } else if (!empty($month)) {
                            echo $month;
                        } else if (!empty($day)) {
                            echo $day;
                        } else echo 'home/statistics';
                        ?>" class="shadow-button" id="dcsv">Download Statistics(CSV)</a>
            <a href="<?php
                        if (isset($_GET['week'])) {
                            $week = $_GET['week'];
                            $link = "home/download_pdf?&week=";
                        } else
                            $week = "";
                        if (isset($_GET['month'])) {
                            $month = $_GET['month'];
                            $link = "home/download_pdf?&month=";
                        } else
                            $month = "";
                        if (isset($_GET['day'])) {
                            $week = $_GET['day'];
                            $link = "home/download_pdf?&day=";
                        } else
                            $day = "";

                            if (!empty($link)) {
                                echo $link;
                            }
                            if (!empty($week)) {
                                echo $week;
                            } else if (!empty($month)) {
                                echo $month;
                            } else if (!empty($day)) {
                                echo $day;
                            } else echo 'home/statistics';
                        ?>" class="shadow-button dpdf">Download Statistics(PDF)</a>
            <a href="<?php
                        if (isset($_GET['week'])) {
                            $week = $_GET['week'];
                            $link = "home/download_html?&week=";
                        } else
                            $week = "";
                        if (isset($_GET['month'])) {
                            $month = $_GET['month'];
                            $link = "home/download_html?&month=";
                        } else
                            $month = "";
                        if (isset($_GET['day'])) {
                            $week = $_GET['day'];
                            $link = "home/download_html?&day=";
                        } else
                            $day = "";
                            if (!empty($link)) {
                                echo $link;
                            }
                            if (!empty($week)) {
                                echo $week;
                            } else if (!empty($month)) {
                                echo $month;
                            } else if (!empty($day)) {
                                echo $day;
                            } else echo 'home/statistics';
                        ?>" class="shadow-button dhtml" download="raport.html">Download Statistics(HTML)</a>
        </div>
    </main>


    <?php require_once 'app/views/includes/footer.php' ?>

</body>

</html>