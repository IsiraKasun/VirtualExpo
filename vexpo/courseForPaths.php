<?php

$con = mysqli_connect("vexpo.futureminds.lk","vexpofuturemind_Isira","test@1992","vexpofuturemind_jayandb");
$msg = "";

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }





if(isset($_POST['submit1'])){

  $path = $_POST['path'];
  $course = $_POST['course'];


  $sql4 = "SELECT COUNT(*) as 'count' FROM path_courses WHERE path_Id = (SELECT path_Id FROM paths WHERE description = '{$path}') AND	course_Id = (SELECT course_Id FROM courses WHERE description = '{$course}')";

  $res4 = mysqli_query($con,$sql4) or die(mysqli_error($con));
  $count = mysqli_fetch_array($res4)['count'];
  if($count != 0){

      $msg = "This entry already exists!";

  }

  else{

    $sql5 = "INSERT INTO path_courses (path_Id,course_Id, created_at) VALUES ( (SELECT path_Id FROM paths WHERE description = '{$path}'),(SELECT course_Id FROM courses WHERE description = '{$course}'),now())";
    $res5 = mysqli_query($con,$sql5) or die(mysqli_error($con));

    $msg = "Entry successfully added!";
  }



}


if(isset($_POST['submit2'])){

  $path2 = $_POST['path2'];

  $sql6 = "SELECT p.path_Id, p.course_Id, c.description, p.created_at FROM path_courses p, courses c WHERE p.path_Id = (SELECT path_Id FROM paths WHERE description = '{$path2}') AND p.course_Id = c.course_Id";
  $res6 = mysqli_query($con,$sql6) or die(mysqli_error($con));




}



$sql1 = "SELECT description	FROM paths ORDER BY path_Id DESC";

$res1 = mysqli_query($con,$sql1) or die(mysqli_error($con));

$sql2 = "SELECT description	FROM courses ORDER BY course_Id DESC";

$res2 = mysqli_query($con,$sql2) or die(mysqli_error($con));



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


        <script>

        function hiddenValue(){

            var e = document.getElementById("path");
            var selectedValue = e.options[e.selectedIndex].value;


            document.getElementById("path2").value = selectedValue;



        }


        $( document ).ready(function() {
            hiddenValue();
            });

        </script>


  </head>

  <body>

    <ul class="nav nav-tabs">
        <li role="presentation"><a href="addPath.php"> Add Path  </a></li>
        <li role="presentation" class="active"><a href="courseForPaths.php"> Courses for Paths </a></li>
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


                <form action="courseForPaths.php" method="post">


                        <div class="form-group">
                              <label > Path </label>
                          <select class="form-control" id="path" name="path" onChange="hiddenValue()">
                            <?php
                            while (($row = mysqli_fetch_array($res1)) != null)
                                {

                                  echo "<option>{$row['description']}</option>";


                                }
                            ?>
                          </select>

                        </div>

                        <div class="form-group">
                              <label > Course Name </label>
                          <select class="form-control" id="course" name="course">
                            <?php
                            while (($row = mysqli_fetch_array($res2)) != null)
                                {

                                  echo "<option>{$row['description']}</option>";


                                }
                            ?>
                          </select>

                        </div>

                        <div class="col-sm-4 col-sm-offset-4">
                        <button type="submit" class="btn btn-success" name="submit1">Submit</button>


                      </div>


                </form>
                 <br/>




              </div>

              <div class="panel-footer">

                                 <form action="courseForPaths.php" method="post">

                                    <input type="hidden" value="" name="path2" id="path2"/>
                                    <button type="submit" class="btn btn-warning" name="submit2">View Courses of Selected Path </button>


                                 </form>


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
                                           <th>Course Name</th>
                                           <th>Created On </th>



                                       </tr>
                                   </thead>
                                   <tbody>


                                     <?php

                                       if(isset($res6)){
                                        while (($row = mysqli_fetch_array($res6)) != null)
                                            {
                                              echo "<tr>";
                                              echo "<td>{$row['path_Id']}</td>";
                                              echo "<td>{$row['course_Id']}</td>";
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
