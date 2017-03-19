<?php

$con = mysqli_connect("vexpo.futureminds.lk","vexpofuturemind_Isira","test@1992","vexpofuturemind_jayandb");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }





if(isset($_POST['submit'])){
  $group = $_POST['group'];

        $sql2 = "SELECT curriculum_Id, description, group_Id, created_at FROM curriculum WHERE group_Id = (SELECT group_Id FROM curriculum_group WHERE description = '{$group}')";

        $res1 = mysqli_query($con,$sql2) or die(mysqli_error($con));

  }







$sql1 = "SELECT description FROM curriculum_group ORDER BY group_id DESC";

$res = mysqli_query($con,$sql1);

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
        <li role="presentation" class="active"><a href="viewCurriculum.php"> View Curriculums </a></li>
        <li role="presentation"><a href="qualification.php"> Add and View Qualifications</a></li>
          <li role="presentation"><a href="index.php"> Main Menu </a></li>
    </ul>

            <div class="container">

            <br/>
            <br/>

            <div class="row">

          <div class="col-sm-6 col-sm-offset-3">



            <div class="panel panel-primary">
                <div class="panel-heading">  <h4 class="panel-title" align="center"> Search Curriculums  </h4></div>
            <div class="panel-body">


              <form action="viewCurriculum.php" method="post">
                      <div class="form-group">
                      <label > Curriculum Groups </label>
                      <select class="form-control" id="group" name="group">
                        <?php
                        while (($row = mysqli_fetch_array($res)) != null)
                            {

                              echo "<option>{$row['description']}</option>";


                            }
                        ?>
                      </select>
                      </div>


                      <div class="col-sm-4 col-sm-offset-4">
                      <button type="submit" class="btn btn-success" name="submit">Submit</button>
                    </div>
              </form>

            </div>

            </div>





          </div>

          </div>


          <br/>
          <br/>


          <div class="row">

              <div class="col-sm-8 col-sm-offset-2">

                <div class="panel panel-primary">
                    <div class="panel-heading">  <h4 class="panel-title" align="center">Curriculum List  </h4></div>
                <div class="panel-body">

                  <div class="table-responsive">
                               <table class="table table-bordered">
                                   <thead>
                                       <tr>

                                           <th>Curriculum ID</th>
                                           <th>Description</th>
                                           <th>Group ID</th>
                                           <th>Created On</th>

                                       </tr>
                                   </thead>
                                   <tbody>


                                  <?php

                                    if(isset($res1)){
                                     while (($row = mysqli_fetch_array($res1)) != null)
                                         {
                                           echo "<tr>";
                                           echo "<td>{$row['curriculum_Id']}</td>";
                                           echo "<td>{$row['description']}</td>";
                                           echo "<td>{$row['group_Id']}</td>";
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
