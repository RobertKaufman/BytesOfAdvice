<?php

include 'connect.php';

$addedCourse = filter_input(INPUT_POST, "courses", FILTER_SANITIZE_NUMBER_INT);
$addedCareer = filter_input(INPUT_POST, "careers", FILTER_SANITIZE_NUMBER_INT);

/*function addCourseRecommendation($careerId, $courseId, $databasePDO){
    $insertStatement = 'INSERT INTO jobrequirements(careerId, courseId) VALUES (:careerId, :courseId)';
    $insertPDO = $databasePDO->prepare($insertStatement);
    $insertStatement->bindValue(':careerId', $careerId);
    $insertStatement->bindValue(':courseId', $courseId);
    $insertStatement->execute();
}

addCourseRecommendation($addedCareer, $addedCourse, $db);*/
$insertStatement = 'INSERT INTO jobrequirements(careerId, courseId) VALUES (:careerId, :courseId)';
$insertPDO = $db->prepare($insertStatement);
$insertPDO->bindValue(':careerId', $addedCareer);
$insertPDO->bindValue(':courseId', $addedCourse);
$insertPDO->execute();
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
                <i class="fas fa-centercode "><p> Use this page to browse the various career pathes you can take</i>
            </div>
            <?php require 'Templates/topnavbar.php';?>
            <p>There is nothing else to do on this page. Just go back to the AddedRecommendation page please.</p>
            <?php require 'templates/bottomnavbar.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>