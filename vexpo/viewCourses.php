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

  $sql = "SELECT ci.course_Id, c.description, ci.institution_Id, ci.duration, ci.cost, ci.created_at FROM courses c, course_institutions ci WHERE ci.course_Id = c.course_Id AND ci.institution_Id = (SELECT institution_Id FROM institutions WHERE 	description = '{$institute}')";

  $res = mysqli_query($con,$sql) or die(mysqli_error($con));



}


$sql1 = "SELECT description FROM institutions ORDER BY institution_Id DESC";

$res1 = mysqli_query($con,$sql1);



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
        <li role="presentation"><a href="institutions.php">Add Institution </a></li>
        <li role="presentation"><a href="addcourse.php"> Add Courses </a></li>
        <li role="presentation" class="active"><a href="viewcourses.php"> View Courses </a></li>
      
          <li role="presentation"><a href="index.php"> Main Menu </a></li>
    </ul>


            <div class="container">

            <br/>
            <br/>

            <div class="row">

              <div class="col-sm-8 col-sm-offset-2">


              <div class="panel panel-primary">
                  <div class="panel-heading">  <h4 class="panel-title" align="center"> Chosse Institutes </h4></div>
              <div class="panel-body">


                <form action="viewCourses.php" method="post">

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

                        <div class="col-sm-4 col-sm-offset-4">
                        <button type="submit" class="btn btn-success" name="submit">List Courses</button>


                      </div>


                </form>
                 <br/>


              </div>

              </div>

              <br/>



          </div>



          </div>


                <div class="row">

                  <div class="col-sm-10 col-sm-offset-1">

                    <div class="panel panel-primary">
                        <div class="panel-heading">  <h4 class="panel-title" align="center"> Courses List  </h4></div>
                    <div class="panel-body">

                      <div class="table-responsive">
                                   <table class="table table-bordered">
                                       <thead>
                                           <tr>

                                               <th>Course ID</th>
                                               <th>Course Name </th>
                                               <th>Institute ID</th>
                                               <th>Duration (Years)</th>
                                               <th> Fee </th>
                                               <th>Created On </th>


                                           </tr>
                                       </thead>
                                       <tbody>


                                         <?php

                                           if(isset($res)){
                                            while (($row = mysqli_fetch_array($res)) != null)
                                                {
                                                  echo "<tr>";
                                                  echo "<td>{$row['course_Id']}</td>";
                                                  echo "<td>{$row['description']}</td>";
                                                  echo "<td>{$row['institution_Id']}</td>";
                                                  echo "<td>{$row['duration']}</td>";
                                                  echo "<td>{$row['cost']}</td>";
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
