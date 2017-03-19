<?php

$con = mysqli_connect("vexpo.futureminds.lk","vexpofuturemind_Isira","test@1992","vexpofuturemind_jayandb");
$msg = "";

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }





if(isset($_POST['submit'])){

  $desgId = $_POST['desgId'];
  $desgName = $_POST['desgName'];

  $sql2 = "SELECT COUNT(*) as 'count' FROM designation WHERE designation_Id = '{$desgId}' OR description = '{$desgName}'";

  $res2 = mysqli_query($con,$sql2) or die(mysqli_error($con));

  $count = mysqli_fetch_array($res2)['count'];
  if($count != 0){

      $msg = "Designation ID or Designation name already exists!";

  }

  else{

    $sql3 = "INSERT INTO designation (designation_Id,description,created_at) VALUES ('{$desgId}', '{$desgName}', now())";

      $res3 = mysqli_query($con,$sql3) or die(mysqli_error($con));

      $msg = "Designation successfully Added!";
  }

}

$sql1 = "SELECT designation_Id,	description,created_at FROM designation ORDER BY designation_Id DESC";

$res1 = mysqli_query($con,$sql1) or die(mysqli_error($con));



 ?>

<!DOCTYPE HTML>
<html>
  <head>
      <title>
          virtualExpo - index
      </title>

      <!-- Latest compiled and minified CSS -->
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

          <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   	<script src="js/jquery-1.11.3.min.js"></script>

   	<!-- Include all compiled plugins (below), or include individual files as needed -->

       <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>

   	<!-- Include all compiled plugins (below), or include individual files as needed -->
   	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


  </head>

  <body>

    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="designations.php"> Designations  </a></li>
        <li role="presentation"><a href="nodes.php"> Nodes </a></li>
        <li role="presentation"><a href="linkDesignations.php"> Link Designations </a></li>
          <li role="presentation"><a href="index.php"> Main Menu </a></li>

    </ul>


            <div class="container">

            <br/>
            <br/>

            <div class="row">

              <div class="col-sm-8 col-sm-offset-2">


              <div class="panel panel-primary">
                  <div class="panel-heading">  <h4 class="panel-title" align="center"> Add Designation </h4></div>
              <div class="panel-body">


                <form action="designations.php" method="post">

                        <div class="form-group">
                        <label> Designation ID </label>
                        <input type="text" class="form-control" placeholder="New Designation ID" name="desgId"/>

                        </div>


                        <div class="form-group">

                          <label> Designation Name </label>
                          <input type="text" class="form-control" placeholder="New Designation Name" name="desgName"/>

                        </div>

                        <div class="col-sm-4 col-sm-offset-4">
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>


                      </div>


                </form>
                 <br/>


              </div>

              </div>

              <br/>

              <center>

                  <?php

                          echo "<h4> {$msg}</h4>";

                   ?>

              </center>

          </div>



          </div>

          <div class="row">

              <div class="col-sm-8 col-sm-offset-2">

                <div class="panel panel-primary">
                    <div class="panel-heading">  <h4 class="panel-title" align="center"> List of Designations </h4></div>
                <div class="panel-body">

                  <div class="table-responsive">
                               <table class="table table-bordered">
                                   <thead>
                                       <tr>

                                           <th>Desgination ID</th>
                                           <th>Desgination Name </th>
                                           <th>Created On </th>


                                       </tr>
                                   </thead>
                                   <tbody>


                                     <?php

                                       if(isset($res1)){
                                        while (($row = mysqli_fetch_array($res1)) != null)
                                            {
                                              echo "<tr>";
                                              echo "<td>{$row['designation_Id']}</td>";
                                              echo "<td>{$row['description']}</td>";
                                              echo "<td>{$row['created_at']}</td>";
                                              echo "</tr>";


                                            } }
                                     ?>

                                   </tbody>
                               </table>
                           </div>




                </div>

                </div>



              </div>


          </div>



        </div>

            </div>


  </body>

</html>
