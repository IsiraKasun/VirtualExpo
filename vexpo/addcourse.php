<?php

$con = mysqli_connect("vexpo.futureminds.lk","vexpofuturemind_Isira","test@1992","vexpofuturemind_jayandb");
$msg = "";

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }





if(isset($_POST['submit'])){

  $institute = $_POST['institute'];
  $chooseCourse = $_POST['chooseCourse'];
  $courseId = $_POST['courseId'];
  $courseName = $_POST['courseName'];
  $duration = $_POST['duration'];
  $cost = $_POST['cost'];


  if($chooseCourse == "New Course"){

      $sql3 = "SELECT COUNT(*) as 'count' FROM courses WHERE course_Id = '{$courseId}' OR description = '{$courseName}'";
      $res3 = mysqli_query($con,$sql3) or die(mysqli_error($con));
      $count = mysqli_fetch_array($res3)['count'];
      if($count != 0){

          $msg = "Course ID or description already exists!";

      }

      else{

        $sql4 = "INSERT INTO courses (course_Id, description, created_at) VALUES ('{$courseId}','{$courseName}', now())";
        $res4 = mysqli_query($con,$sql4) or die(mysqli_error($con));

        $sql5 = "INSERT INTO course_institutions (course_Id, institution_Id, duration	,cost, created_at) VALUES ('{$courseId}',(SELECT institution_Id FROM institutions WHERE description = '{$institute}'), '{$duration}','{$cost}', now())";
        $res5 = mysqli_query($con,$sql5) or die(mysqli_error($con));

          $msg = "Course successfully Added!";
      }



  }

  else {

    $sql6 = "INSERT INTO course_institutions (course_Id, institution_Id, duration	,cost, created_at) VALUES ((SELECT course_Id FROM courses WHERE description = '{$chooseCourse}'),(SELECT institution_Id FROM institutions WHERE description = '{$institute}'), '{$duration}','{$cost}', now())";
    $res6 = mysqli_query($con,$sql6) or die(mysqli_error($con));

      $msg = "Course successfully Added!";

  }



}


$sql1 = "SELECT description FROM institutions ORDER BY institution_Id DESC";

$res1 = mysqli_query($con,$sql1);

$sql2 = "SELECT 	description FROM courses ORDER BY course_Id DESC";

$res2 = mysqli_query($con,$sql2);


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

            function collapseWell(){

                var e = document.getElementById("chooseCourse");
    			      var selectedValue = e.options[e.selectedIndex].value;

                if(selectedValue == "New Course"){
                  document.getElementById("collapseButton").disabled = false;


                }

                else{
                    document.getElementById("collapseButton").setAttribute("disabled", true);
                }
            }

     </script>
  </head>

  <body>

    <ul class="nav nav-tabs">
        <li role="presentation"><a href="institutions.php">Add Institution </a></li>
        <li role="presentation" class="active"><a href="addcourse.php"> Add Courses </a></li>
        <li role="presentation"><a href="viewCourses.php"> View Courses </a></li>
        <li role="presentation"><a href="index.php"> Main Menu </a></li>
    </ul>


            <div class="container">

            <br/>
            <br/>

            <div class="row">

              <div class="col-sm-8 col-sm-offset-2">


              <div class="panel panel-primary">
                  <div class="panel-heading">  <h4 class="panel-title" align="center"> Add Course </h4></div>
              <div class="panel-body">


                <form action="addcourse.php" method="post">

                        <div class="form-group">
                              <label > Choose Institutions </label>
                          <select class="form-control" id="institute" name="institute">
                            <?php
                            while (($row = mysqli_fetch_array($res1)) != null)
                                {

                                  echo "<option>{$row['description']}</option>";


                                }
                            ?>
                          </select>

                        </div>


                        <div class="form-group">
                              <label > Choose Course </label>
                          <select class="form-control" id="chooseCourse" name="chooseCourse" onChange="collapseWell()">
                            <option selected>New Course</option>
                            <?php
                            while (($row = mysqli_fetch_array($res2)) != null)
                                {

                                  echo "<option>{$row['description']}</option>";


                                }
                            ?>
                          </select>

                        </div>

                        <div class="form-group">

                          <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" id="collapseButton" >
                                  New Course
                                </button>
                                <br/>
                                <div class="collapse" id="collapseExample">
                                  <div class="well">
                                    <div class="form-group">
                                    <label > Course ID </label>
                                    <input type="text" name="courseId" class="form-control" id="courseId" placeholder="New Course ID">
                                    </div>
                                    <div class="form-group">
                                    <label > Course Name </label>
                                    <input type="text" name="courseName" class="form-control" id="courseName" placeholder="Course Name">
                                    </div>

                                    <div class="form-group">
                                    <label > Duration </label>
                                    <input type="text" name="duration" class="form-control" id="duration" placeholder="Duration in Years">
                                    </div>

                                    <div class="form-group">
                                    <label > Fee </label>
                                    <input type="text" name="cost" class="form-control" id="cost" placeholder="Cost for the Course">
                                    </div>
                                  </div>
                                </div>

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



        </div>

            </div>


  </body>

</html>
