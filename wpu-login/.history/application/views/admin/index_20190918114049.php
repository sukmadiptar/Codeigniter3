<?php  
 $conn = mysqli_connect("localhost", "root", "~tK3Cn)_W", "wpu_login");  
 
 $male 	= $conn->query("SELECT * FROM employee WHERE gender = 'male'");
 $female = $conn->query("SELECT * FROM employee WHERE gender = 'female'");

 $tot_male 	= mysqli_num_rows($male);
 $tot_female = mysqli_num_rows($female);
?> 

 
        
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div id="piechart" style="width: 900px; height: 500px;"></div>
              
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      