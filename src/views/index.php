<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight tracking Home</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/components/_nav.css">
    <link rel="stylesheet" href="css/sections/index.css"






    <!-- GOOGLE CHARTS -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Time Stamp','Weight'],
            <?php
            foreach($entryList as $entry){
                echo "['${entry['timeStamp']}',${entry['weight']}],";
            }
            ?>
        ]);

        var options = {
          title: 'Weight Time Line',
          curveType: 'function',
          width: 1200,
          colors:['#4da6ff'],
          lineWidth: 4,
          legend: { position: 'bottom' },
          chartArea: {
            backgroundColor: 
            {
                fill: '#FF0000',
                fillOpacity: 0.1
            }
            
          },
          backgroundColor: {
            fill: '#FF0000',
            fillOpacity: 0
          },
          forgroundColor:{
            fill: '#FFFFFF'
          },
          hAxis: {
            textStyle:{color: '#FFF'}
          },
          vAxis:{
            textStyle:{color: '#FFF'}
          }

        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
</head>
<body>
    <div class="body-container">
        <?php include VIEW_PATH . '/component/_nav.php'; ?>
        <header>
            <div class="header-container">
                <div>
                    <h1>Weight Tracker EXTREME!!!</h1>
                    <p>
                        Lets track that weight!<br/>
                        Lets loose that weight!
                    </p>
                </div>
                <div>
                    <hgroup>
                        <h3>Your current weight is:</h4>
                        <h6 class="shadowText">as of <?= $timeStamp; ?></h6>
                        <h1><?= $weight; ?> pds</h1>
                        <h3>Your goal weight is:</h3>
                        <h1>200 pds</h1>
                    </hgroup>
                </div>
            </div>
        </header>


        <main>
            <div class="main-container">
                <!-- ADD GOOGLE TABLES HERE -->
                <h2>History Chart Below</h2>
                <div id="curve_chart" style="width: 900px;height: 500px"></div>
            </div>
        </main>
    </div>
</body>
</html>