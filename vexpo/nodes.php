<?php

$con = mysqli_connect("vexpo.futureminds.lk","vexpofuturemind_Isira","test@1992","vexpofuturemind_jayandb");
$msg = "";

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }





if(isset($_POST['submit'])){

  $nodeId = $_POST['nodeId'];
  $curriculum = $_POST['curriculum'];
  $qualification = $_POST['qualification'];
  $decript = $_POST['descript'];

  $sql4 = "SELECT COUNT(*) as 'count' FROM node WHERE node_Id = '{$nodeId}' OR description = '{$decript}'";

  $res4 = mysqli_query($con,$sql4) or die(mysqli_error($con));

  $count = mysqli_fetch_array($res4)['count'];
  if($count != 0){

      $msg = "Node ID or Designation already exists!";

  }

  else{

      $sql5 = "INSERT INTO node (node_Id, curriculum_Id, qualification_Id, description, created_at) ";
      $sql5 = $sql5."VALUES ('{$nodeId}',(SELECT curriculum_Id  FROM 	curriculum WHERE 	description = '{$curriculum}'),(SELECT qualification_Id FROM qualification
 WHERE description	= '{$qualification}'),'{$decript}', now())";

      $res5 = mysqli_query($con,$sql5) or die(mysqli_error($con));

      $msg = "Node successfully added!";



  }



}


$sql1 = "SELECT node_Id,	curriculum_Id,qualification_Id, description, created_at FROM node ORDER BY node_Id DESC";

$res1 = mysqli_query($con,$sql1) or die(mysqli_error($con));


$sql2 = "SELECT description FROM curriculum ORDER BY curriculum_Id DESC";

$res2 = mysqli_query($con,$sql2) or die(mysqli_error($con));


$sql3 = "SELECT description FROM qualification ORDER BY qualification_Id DESC";

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
        <li role="presentation" class="active"><a href="nodes.php"> Nodes </a></li>
        <li role="presentation"><a href="linkDesignations.php"> Link Designations </a></li>
          <li role="presentation"><a href="index.php"> Main Menu </a></li>

    </ul>


            <div class="container">

            <br/>
            <br/>

            <div class="row">

              <div class="col-sm-8 col-sm-offset-2">


              <div class="panel panel-primary">
                  <div class="panel-heading">  <h4 class="panel-title" align="center"> Add Node </h4></div>
              <div class="panel-body">


                <form action="nodes.php" method="post">

                        <div class="form-group">
                        <label> Node ID </label>
                        <input type="text" class="form-control" placeholder="New Node ID" name="nodeId"/>
                        </div>

                        <div class="form-group">
                              <label > Choose Curriculum </label>
                          <select class="form-control" id="curriculum" name="curriculum">
                            <?php
                            while (($row = mysqli_fetch_array($res2)) != null)
                                {

                                  echo "<option>{$row['description']}</option>";


                                }
                            ?>
                          </select>

                        </div>


                        <div class="form-group">
                              <label > Choose Qualification </label>
                          <select class="form-control" id="qualification" name="qualification">
                            <?php
                            while (($row = mysqli_fetch_array($res3)) != null)
                                {

                                  echo "<option>{$row['description']}</option>";


                                }
                            ?>
                          </select>

                        </div>

                        <div class="form-group">
                        <label> Node Description </label>
                        <input type="text" class="form-control" placeholder="New Node Description" name="descript"/>
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
