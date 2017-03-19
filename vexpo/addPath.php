<?php

$con = mysqli_connect("vexpo.futureminds.lk","vexpofuturemind_Isira","test@1992","vexpofuturemind_jayandb");
$msg = "";

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }





if(isset($_POST['submit'])){

  $pathId = $_POST['pathId'];
  $startNode = $_POST['startNode'];
  $endNode = $_POST['endNode'];
  $descript = $_POST['descript'];

  $sql4 = "SELECT COUNT(*) as 'count' FROM paths WHERE path_Id = '{$pathId}' OR 	description = '{$descript}'";

  $res4 = mysqli_query($con,$sql4) or die(mysqli_error($con));
  $count = mysqli_fetch_array($res4)['count'];
  if($count != 0){

      $msg = "Path ID or Path description already exists!";

  }

  else{

    $sql5 = "INSERT INTO paths (path_Id,start_Node,	end_Node,	description,created_at) VALUES ('{$pathId}',(SELECT node_Id FROM node WHERE description = '{$startNode}'),(SELECT node_Id FROM node WHERE description = '{$endNode}'),'{$descript}', now())";
    $res5 = mysqli_query($con,$sql5) or die(mysqli_error($con));

    $msg = "Path successfully added!";
  }



}

$sql1 = "SELECT 	path_Id, start_Node, end_Node, description,created_at FROM paths ORDER BY path_Id DESC";

$res1 = mysqli_query($con,$sql1) or die(mysqli_error($con));

$sql2 = "SELECT description	FROM node ORDER BY node_Id DESC";

$res2 = mysqli_query($con,$sql2) or die(mysqli_error($con));

$sql3 = "SELECT description	FROM node ORDER BY node_Id DESC";

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
        <li role="presentation" class="active"><a href="addPath.php"> Add Path  </a></li>
        <li role="presentation"><a href="courseForPaths.php"> Courses for Paths </a></li>
          <li role="presentation"><a href="index.php"> Main Menu </a></li>


    </ul>


            <div class="container">

            <br/>
            <br/>

            <div class="row">

              <div class="col-sm-8 col-sm-offset-2">


              <div class="panel panel-primary">
                  <div class="panel-heading">  <h4 class="panel-title" align="center"> Add New Path </h4></div>
              <div class="panel-body">


                <form action="addPath.php" method="post">

                        <div class="form-group">
                        <label> Path ID </label>
                        <input type="text" class="form-control" placeholder="New Path ID" name="pathId"/>

                        </div>


                        <div class="form-group">
                              <label > Starting Node </label>
                          <select class="form-control" id="startNode" name="startNode">
                            <?php
                            while (($row = mysqli_fetch_array($res2)) != null)
                                {

                                  echo "<option>{$row['description']}</option>";


                                }
                            ?>
                          </select>

                        </div>

                        <div class="form-group">
                              <label > Ending Node </label>
                          <select class="form-control" id="endNode" name="endNode">
                            <?php
                            while (($row = mysqli_fetch_array($res3)) != null)
                                {

                                  echo "<option>{$row['description']}</option>";


                                }
                            ?>
                          </select>

                        </div>

                        <div class="form-group">
                        <label> Path Description </label>
                        <input type="text" class="form-control" placeholder="Path Description" name="descript"/>

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
                    <div class="panel-heading">  <h4 class="panel-title" align="center"> Path List </h4></div>
                <div class="panel-body">

                  <div class="table-responsive">
                               <table class="table table-bordered">
                                   <thead>
                                       <tr>

                                           <th>Path ID</th>
                                           <th>Starting Node ID </th>
                                           <th>Ending Node ID</th>
                                           <th>Description </th>
                                           <th>Created On</th>


                                       </tr>
                                   </thead>
                                   <tbody>


                                     <?php

                                       if(isset($res1)){
                                        while (($row = mysqli_fetch_array($res1)) != null)
                                            {
                                              echo "<tr>";
                                              echo "<td>{$row['path_Id']}</td>";
                                              echo "<td>{$row['start_Node']}</td>";
                                              echo "<td>{$row['end_Node']}</td>";
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
