<?php

$con = mysqli_connect("vexpo.futureminds.lk","vexpofuturemind_Isira","test@1992","vexpofuturemind_jayandb");
$msg = "";
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }





if(isset($_POST['submit'])){
  $institution = $_POST['inst'];
  $descript = $_POST['descript'];

        $sql1 = "SELECT COUNT(*) as 'count' FROM institutions WHERE institution_Id = '{$institution}' OR description = '{$descript}'";

        $res1 = mysqli_query($con,$sql1) or die(mysqli_error($con));

        $count = mysqli_fetch_array($res1)['count'];

        if($count !=0){

            $msg = "Institution ID or description already exists!";

        }

        else{

            $sql2 = "INSERT INTO institutions (institution_Id, description, created_at ) VALUES ('{$institution}', '{$descript}', now())";

            $res2 = mysqli_query($con,$sql2) or die(mysqli_error($con));

            $msg = "Institution Successfully Added!";

        }

  }


$sql3 = "SELECT institution_Id, description, created_at FROM institutions ORDER BY institution_Id DESC";

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
        <li role="presentation" class="active"><a href="institutions.php">Add Institution </a></li>
        <li role="presentation"><a href="addcourse.php"> Add Courses </a></li>
        <li role="presentation"><a href="viewCourses.php"> View Courses </a></li>
          <li role="presentation"><a href="index.php"> Main Menu </a></li>

    </ul>

            <div class="container">

            <br/>
            <br/>

            <div class="row">

          <div class="col-sm-6 col-sm-offset-3">



            <div class="panel panel-primary">
                <div class="panel-heading">  <h4 class="panel-title" align="center"> Add Institution  </h4></div>
            <div class="panel-body">


              <form action="institutions.php" method="post">

                <div class="form-group">
                <label > Institution ID </label>
                <input type="text" name="inst" class="form-control" id="qualIdId" placeholder="Institution ID">


                </div>

                <div class="form-group">
                <label > Description </label>
                <input type="text" name="descript" class="form-control" id="descript" placeholder="Add Description">


                </div>






                      <div class="col-sm-4 col-sm-offset-4">
                      <button type="submit" class="btn btn-success" name="submit">Submit</button>
                    </div>
              </form>

            </div>

            </div>

            <div class="row">

                <center>

                  <?php
                      echo "<h4> {$msg}</h4>";

                   ?>

                <center>

            </div>





          </div>

          </div>


          <br/>
          <br/>


          <div class="row">

              <div class="col-sm-8 col-sm-offset-2">

                <div class="panel panel-primary">
                    <div class="panel-heading">  <h4 class="panel-title" align="center"> Institutions List  </h4></div>
                <div class="panel-body">

                  <div class="table-responsive">
                               <table class="table table-bordered">
                                   <thead>
                                       <tr>

                                           <th>Institute ID</th>
                                           <th>Description</th>
                                           <th>Created On </th>


                                       </tr>
                                   </thead>
                                   <tbody>


                                  <?php

                                    if(isset($res3)){
                                     while (($row = mysqli_fetch_array($res3)) != null)
                                         {
                                           echo "<tr>";
                                           echo "<td>{$row['institution_Id']}</td>";
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
