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
            <?php for ($k = 0; $k < count($data['judete']); $k++): ?>
                <td><?php echo $data['judete'][$k]; ?></td>
                <td><?php echo $data['judNrRapoarte'][$data['judeteToIDJud'][$data['judete'][$k]]]; ?></td>
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
                <?php for ($k = 0; $k < count($data['judete']); $k++): ?>
                    ['<?php echo $data['judete'][$k]; ?>', parseInt('<?php echo $data['judNrRapoarte'][$data['judeteToIDJud'][$data['judete'][$k]]]; ?>')],
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