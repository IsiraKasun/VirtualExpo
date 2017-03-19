<?php

$con = mysqli_connect("vexpo.futureminds.lk","vexpofuturemind_Isira","test@1992","vexpofuturemind_jayandb");
$msg = "";
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }





if(isset($_POST['submit'])){
  $qualification = $_POST['qualId'];
  $descript = $_POST['descript'];

        $sql1 = "SELECT COUNT(*) as 'count' FROM qualification WHERE qualification_Id = '{$qualification}' OR description = '{$descript}'";

        $res1 = mysqli_query($con,$sql1) or die(mysqli_error($con));

        $count = mysqli_fetch_array($res1)['count'];

        if($count !=0){

            $msg = "Qualification ID or description already exists!";

        }

        else{

            $sql2 = "INSERT INTO qualification (qualification_Id, description, created_at ) VALUES ('{$qualification}', '{$descript}', now())";

            $res2 = mysqli_query($con,$sql2) or die(mysqli_error($con));

            $msg = "Qualification Successfully Added!";

        }

  }


$sql3 = "SELECT qualification_Id, description, created_at FROM qualification ORDER BY qualification_Id DESC";

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
        <li role="presentation"><a href="curriculum.php">Add curriculums </a></li>
        <li role="presentation"><a href="viewCurriculum.php"> View Curriculums </a></li>
        <li role="presentation"  class="active"><a href="qualification.php"> Add and View Qualifications</a></li>
          <li role="presentation"><a href="index.php"> Main Menu </a></li>
    </ul>

            <div class="container">

            <br/>
            <br/>

            <div class="row">

          <div class="col-sm-6 col-sm-offset-3">



            <div class="panel panel-primary">
                <div class="panel-heading">  <h4 class="panel-title" align="center"> Add Qualification  </h4></div>
            <div class="panel-body">


              <form action="qualification.php" method="post">

                <div class="form-group">
                <label > Qualification ID </label>
                <input type="text" name="qualId" class="form-control" id="qualIdId" placeholder="Qualification ID">


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
                    <div class="panel-heading">  <h4 class="panel-title" align="center"> Qualifiaction List  </h4></div>
                <div class="panel-body">

                  <div class="table-responsive">
                               <table class="table table-bordered">
                                   <thead>
                                       <tr>

                                           <th>Qualification ID</th>
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
