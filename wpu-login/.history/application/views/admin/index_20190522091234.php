<?php  
 $conn = mysqli_connect("localhost", "root", "~tK3Cn)_W", "wpu_login");  
 
 $male 	= $conn->query("SELECT * FROM employee WHERE gender = 'male'");
 $female = $conn->query("SELECT * FROM employee WHERE gender = 'female'");

 $tot_male 	= mysqli_num_rows($male);
 $tot_female = mysqli_num_rows($female);
?> 
  <!-- Google Chart -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Gender', 'Total'],
          ['Male', <?= $tot_male ?>],
          ['female', <?= $tot_female ?>]
        ]);

        var options = {
          title: 'Pie chart gender',
          pieHole: 0.4
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        
        google.visualization.events.addListener(chart, 'ready', function () {
      	chart.setSelection([{row:99, column:1}]);
      	 // Select one of the points.
      	png = '<a href="' + chart.getImageURI() + '">Printable version</a>';
     	    console.log(png);
  	  	});

        chart.draw(data, options);
      }
  </script>
        
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div id="piechart" style="width: 900px; height: 500px;"></div>
              
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      