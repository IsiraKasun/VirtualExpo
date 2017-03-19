<?php

$con = mysqli_connect("vexpo.futureminds.lk","vexpofuturemind_Isira","test@1992","vexpofuturemind_jayandb");
$msg = "";

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }





if(isset($_POST['submit'])){

  $node = $_POST['node'];
  $desgName = $_POST['desgName'];

  $sql4 = "SELECT COUNT(*) as 'count' FROM node_designations WHERE node_Id = (SELECT node_Id FROM node WHERE description = '{$node}') AND	designation_Id = (SELECT designation_Id FROM designation WHERE description = '{$desgName}')";

  $res4 = mysqli_query($con,$sql4) or die(mysqli_error($con));

  $count = mysqli_fetch_array($res4)['count'];
  if($count != 0){

      $msg = "This entry already exists!";
      echo $count;
  }

  else {

      $sql5 = "INSERT INTO node_designations (node_Id,designation_Id, created_at) VALUES ((SELECT node_Id FROM node WHERE description = '{$node}'),(SELECT designation_Id FROM designation WHERE description = '{$desgName}'), now())";

      $res4 = mysqli_query($con,$sql5) or die(mysqli_error($con));

      $msg = "Link successfully created!";

  }



}


$sql1 = "SELECT node_Id,	curriculum_Id,qualification_Id, description, created_at FROM node ORDER BY node_Id DESC";

$res1 = mysqli_query($con,$sql1) or die(mysqli_error($con));

$sql2 = "SELECT description FROM designation ORDER BY designation_Id DESC";

$res2 = mysqli_query($con,$sql2) or die(mysqli_error($con));


$sql3 = "SELECT description FROM node ORDER BY node_Id DESC";

$res3 = mysqli_query($con,$sql3) or die(mysqli_error($con));



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
        <li role="presentation"><a href="designations.php"> Designations  </a></li>
        <li role="presentation"><a href="nodes.php"> Nodes </a></li>
        <li role="presentation" class="active"><a href="linkDesignations.php"> Link Designations </a></li>
          <li role="presentation"><a href="index.php"> Main Menu </a></li>

    </ul>


            <div class="container">

            <br/>
            <br/>

            <div class="row">

              <div class="col-sm-6">


              <div class="panel panel-primary">
                  <div class="panel-heading">  <h4 class="panel-title" align="center"> Add Node </h4></div>
              <div class="panel-body">


                <form action="linkDesignations.php" method="post">



                        <div class="form-group">
                              <label > Choose Node  </label>
                          <select class="form-control" id="node" name="node">
                            <?php
                            while (($row = mysqli_fetch_array($res3)) != null)
                                {

                                  echo "<option>{$row['description']}</option>";
//

                                }
                            ?>
                          </select>

                        </div>


                        <div class="form-group">
                              <label > Choose Designation </label>
                          <select class="form-control" id="desgName" name="desgName">
                            <?php
                            while (($row = mysqli_fetch_array($res2)) != null)
                                {

                                  echo "<option>{$row['description']}</option>";


                                }
                            ?>
                          </select>

                        </div>

                        <div class="col-sm-4 col-sm-offset-4">
                        <button type="submit" class="btn btn-success" name="submit">Link</button>


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







            <div class="col-sm-6">

              <div class="panel panel-primary">
                  <div class="panel-heading">  <h4 class="panel-title" align="center"> List of Nodes </h4></div>
              <div class="panel-body">

                <div class="table-responsive">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>

                                         <th>Node ID</th>
                                         <th> Curriculum ID </th>
                                         <th> Qualifcation ID</th>
                                         <th> Description </th>
                                        <th> Created On </th>



                                     </tr>
                                 </thead>
                                 <tbody>


                                   <?php

                                     if(isset($res1)){
                                      while (($row = mysqli_fetch_array($res1)) != null)
                                          {
                                            echo "<tr>";
                                            echo "<td>{$row['node_Id']}</td>";
                                            echo "<td>{$row['curriculum_Id']}</td>";
                                            echo "<td>{$row['qualification_Id']}</td>";
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
