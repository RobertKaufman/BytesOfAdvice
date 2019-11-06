<?php

    include 'connect.php';

    //filtered to ensure a malicious user cannot modify the html to allow a non-int value to be passed
    $selectedCareerId = filter_input(INPUT_POST, 'careers', FILTER_SANITIZE_NUMBER_INT);

    $singleCareerQuery = "SELECT * FROM career WHERE CareerId = :career";

    $selectedCareerPDO = $db->prepare($singleCareerQuery);
    $selectedCareerPDO->bindValue(':career', $selectedCareerId);
    $selectedCareerPDO->execute();
    $selectedCareer = $selectedCareerPDO->fetch();


    //function designed to be passed a course Id and return the course data. Designed to be useable
    //in a loop function
    function fetchCourseData($courseId, $db)
    {
        $singleCourseSelectStatement = 'SELECT * FROM courses WHERE CourseId = :courseId';
        $singleCoursePDO = $db->prepare($singleCourseSelectStatement);
        $singleCoursePDO->bindValue(':courseId', $courseId);
        $singleCoursePDO->execute();
        $returnedCourse = $singleCoursePDO->fetch();
        return $returnedCourse;
    }

    $recommendedCoursesSelect = 'SELECT CourseId FROM jobrequirements WHERE CareerId = :careerId';
    $recommendedCoursesPDO = $db->prepare($recommendedCoursesSelect);
    $recommendedCoursesPDO->bindValue(':careerId', $selectedCareerId);
    $recommendedCoursesPDO->execute();
    //$coursesId = $recommendedCoursesPDO->fetchAll();

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
        <i class="fas fa-centercode "><p> So, you are interested in becoming a <?=$selectedCareer['CareerName']?></i>
    </div>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" href="LaunchPage.php">HomePage</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="CareerHomePage.php">See the careeres!</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="CoursesHomePage.php">See the Courses!</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="CreateAccount.php">Create an account!</a>
        </li>
    </ul>

    <div class="DisplayCareerInfo">
        <h3>Alright, here is some info</h3>
        <br>
        <h4>Career Name: <?=$selectedCareer['CareerName']?></h4>
        <br>
        <h6>Job Prospects: <?=$selectedCareer['CareerDemand']?></h6>
        <br>
        <h6>Average Salary: <?=$selectedCareer['CareerSalary']?>
        <br>
        <h6>Brief Description Below</h6>
        <p id="careerDescription"><?=$selectedCareer['CareerDescription']?></p>
        <br>
        <h6>Recommended term 5 courses<h6>
        <?php while($courseFK = $recommendedCoursesPDO->fetch()):?>
        <?=var_dump($db)?>
            <?= $currentCourse = fetchCourseData($courseFK[0], $db)?>
            <h6>Course Name: <?=$currentCourse['Name']?></h4>
            <h6>Description:</h4>
            <p><?=$currentCourse['Description']?></p>
            <?= $currentCourse = null?>
        <?php endwhile?>
    </div>

    <div class="comments">
    </div>
    <h6>Users and admins can use the pages below<h6>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" href="AddRecommendation.php">Add a recommended course!</a>
        </li>
    </ul>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>