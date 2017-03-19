<?php

$con = mysqli_connect("vexpo.futureminds.lk","vexpofuturemind_Isira","test@1992","vexpofuturemind_jayandb");
$msg = "";
$msg1 = "";
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }





if(isset($_POST['submit1'])){

  $groupId = $_POST['groupId'];
  $descrpt = $_POST['descript'];

  $sql3 = "SELECT COUNT(*) as 'count' FROM curriculum_group WHERE group_Id = '{$groupId}' OR description = '{$descrpt}'";

  $res2 = mysqli_query($con,$sql3) or die(mysqli_error($con));

  $count = mysqli_fetch_array($res2)['count'];
  if($count != 0){

      $msg = "Curriculum Group ID or description already exists!";

  }

  else{
    $sql2 = "INSERT INTO curriculum_group (group_Id, description, created_at) VALUES ('{$groupId}','{$descrpt}', now())";

    $res1 = mysqli_query($con,$sql2) or die(mysqli_error($con));

    $msg = "Curriculum group successfully added!";

  }

}

if(isset($_POST['submit2'])){

  $curriculum = $_POST['curriculumId'];
  $descrption = $_POST['curdescript'];
  $group = $_POST['group'];
  $sql4 = "SELECT COUNT(*) as 'count' FROM curriculum WHERE curriculum_Id = '{$curriculum}' OR description = '{$descrption}'";

  $res3 = mysqli_query($con,$sql4) or die(mysqli_error($con));

  $count1 = mysqli_fetch_array($res3)['count'];
  if($count1 != 0){

      $msg1 = "Curriculum ID or description already exists!";

  }

  else{
    $sql5 = "INSERT INTO curriculum (curriculum_Id, description, group_Id ,created_at) VALUES ('{$curriculum}','{$descrption}', (SELECT group_Id FROM curriculum_group WHERE description = '{$group}'), now())";

    $res1 = mysqli_query($con,$sql5) or die(mysqli_error($con));

    $msg1 = "Curriculum successfully added!";

  }

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
        <li role="presentation" class="active"><a href="curriculum.php">Add curriculums </a></li>
        <li role="presentation"><a href="viewCurriculum.php"> View Curriculums </a></li>
        <li role="presentation"><a href="qualification.php"> Add and View Qualifications</a></li>
          <li role="presentation"><a href="index.php"> Main Menu </a></li>
    </ul>

            <div class="container">

            <br/>
            <br/>

            <div class="row">

              <div class="col-sm-6">


              <div class="panel panel-primary">
                  <div class="panel-heading">  <h4 class="panel-title" align="center"> Add Curriculum Group </h4></div>
              <div class="panel-body">


                <form action="curriculum.php" method="post">
                        <div class="form-group">
                        <label > Curriculum Group ID </label>
                        <input type="text" class="form-control" id="curricululmGroupId" placeholder="Curriculum Group ID" name="groupId">
                        </div>

                        <div class="form-group">
                        <label > Description </label>
                        <input type="text" class="form-control" id="descriptionId" placeholder="Add Description" name="descript">
                        </div>



                        <div class="col-sm-4 col-sm-offset-4">
                        <button type="submit" class="btn btn-success" name="submit1">Submit</button>


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
                <div class="panel-heading">  <h4 class="panel-title" align="center"> Add Curriculum  </h4></div>
            <div class="panel-body">


              <form action="curriculum.php" method="post">
                      <div class="form-group">
                      <label > Curriculum ID </label>
                      <input type="text" class="form-control" id="curricululmGroupId" placeholder="Curriculum" name="curriculumId">
                      </div>

                      <div class="form-group">
                      <label > Description </label>
                      <input type="text" class="form-control" id="descriptionId" placeholder="Add Description" name="curdescript">
                      </div>


                      <div class="form-group">
                            <label > Curriculum Group</label>
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
                      <button type="submit" class="btn btn-success" name="submit2">Submit</button>
                    </div>
              </form>

            </div>

            </div>

                <center>

                    <?php  echo "<h4> {$msg1} </h4>"?>

                </center>



          </div>

          </div>



        </div>

            </div>


  </body>

</html>
