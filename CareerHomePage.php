<?php
/* Webdev Final Project
Date: November 2nd, 2019
Purpose: To provide a website to give BIT students an idea for what term 5 electives to take
Author: Robert Kaufman
Class Instructor: Jody Gillis
Sources
Wage information: Glassdoor.com
Front end, Back end, and Full stack job descriptions:https://hackernoon.com/should-you-be-a-back-end-front-end-or-full-stack-developer-cf3a39aa95de
Referenced, not quoted
Database Administrator, network engineer, Project Manager Descriptions - https://www.prospects.ac.uk/job-profiles
Referenced, not quoted
Security Engineer Description - https://www.techrepublic.com/article/the-10-most-in-demand-tech-jobs-of-2019/
Referenced, not quoted
Job Availability Statistics - https://www.jobbank.gc.ca/outlookreport
Red River Course Descriptions - https://catalogue.rrc.ca/Programs/WPG/Fulltime/BUSGF-DP/CoursesandDescriptions
*/

/*Important information
Careers Columns: CareerId, CareerDemand, CareerDescription, CareerName, CareerSalary
Course Columns: CourseId, Name, Description
CurrentUser
*/

//start by fetching the careers pho data and build a drop down bar for the users
//then link to a specific page with more information on the career

  include 'connect.php';

  $SelectCareersStatement = 'SELECT * FROM career';
  $pdoExectue = $db->prepare($SelectCareersStatement);
  $pdoExectue->execute();
  $careerList = $pdoExectue->fetchAll();

  $allBlogs = "SELECT * FROM comments WHERE page='CareerPage' ORDER BY commentpk DESC LIMIT 5";
  $fetchStatement = $db->prepare($allBlogs); // Returns a PDOStatement object.
  $fetchStatement->execute(); // The query is now executed.
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

    <div class="CourseSelector">
    <h6>Currently there are <?= $pdoExectue->rowCount()?> Career entries </h6>
    <form action='DetailedCareerPage.php' method="post">
      <select name="careers">
        <?php foreach($careerList as $career):?>
            <option value=<?=$career['CareerId']?>><?=$career['CareerName']?></option>
        <?php endforeach?>
      </select>
      <input type='submit' value='Submit'>
    </form>
    </div>
    <div id='CommentContainer'>
    <h5>Have a commment about some data we are presenting?</h5>
    <form id='launchcomment'>
    <button name='launchcomment' formid='launchcomment' type="submit" formaction='comments/CreateCareerComment.php' formmethod='post' class="btn btn-primary">Leave a comment</button>
      <!--<a name="sendToComments" class="btn btn-primary" href="CreateLaunchComment.php" role="button">Click here to create a new post</a>-->
      <a name="sendToNewUser" class="btn btn-primary" href="CreateAccount.php" role="button">Click here to register for an account</a>
    </form>
    <br>
      <div id='Comments'>
      <?php if( $fetchStatement->rowCount() > 0):?>
        <?php while ($comment = $fetchStatement->fetch()): ?>
        <p> Posted by: <?= $comment['user']?> </p>
        <p><?= $comment['comment']?></p>
        <br>
        <?php endwhile ?>
        <?php endif ?>
      </div>
    </div>
    <?php require 'templates/bottomnavbar.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>