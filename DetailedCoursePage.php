<?php

    include 'connect.php';

    //filtered to ensure a malicious user cannot modify the html to allow a non-int value to be passed
    $selectedCourseId = filter_input(INPUT_POST, 'SelectedCourse', FILTER_SANITIZE_NUMBER_INT);

    $singleCourseQuery = "SELECT * FROM courses WHERE CourseId = :course";

    $selectedCoursePDO = $db->prepare($singleCourseQuery);
    $selectedCoursePDO->bindValue(':course', $selectedCourseId);
    $selectedCoursePDO->execute();
    $selectedCourse = $selectedCoursePDO->fetch();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type= "text/css" href="StyleBytes.css">
  </head>
  <body>
  <div id='ContentHeading'>
      <i class="fa fa-align-center" aria-hidden="true"><h3>Bit Career Recommendations!</h3></i>
   </div>
   <div id='Content'>
        <i class="fas fa-centercode "><p> So, you are interested in taking  <?=$selectedCourse['Name']?></i>
    </div>
    <?php require 'Templates/topnavbar.php';?>

    <div class="DisplayCareerInfo">
        <h3>Alright, here is some info</h3>
        <br>
        <h4>Course Name: <?=$selectedCourse['Name']?></h4>
        <br>
        <h6>Brief Description Below</h6>
        <p id="careerDescription"><?=$selectedCourse['Description']?></p>
        <br>
    </div>

    <div class="comments">
    </div>
    <?php require 'templates/bottomnavbar.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>