<?php
require '../authenticateAdmin.php';
//have a drop down list for each career and comment
//then have two buttons - one for update, and one for delete, and have it taken to a new page
//or do we want each form to just be the submission
//look into doing that

$SelectCareersStatement = 'SELECT * FROM career';
$pdoCareerExecute = $db->prepare($SelectCareersStatement);
$pdoCareerExecute->execute();
$careerList = $pdoCareerExecute->fetchAll();

$SelectCourseStatement = 'SELECT * FROM courses';
$pdoCourseExecute = $db->prepare($SelectCourseStatement);
$pdoCourseExecute->execute();
$CourseList = $pdoCourseExecute->fetchAll();

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
  </head>
  <body>
  <?php require '../Templates/FileUptopnavbar.php'?>
    <form action="submitcareerchanges.php" method="post">
    <select name="careers">
        <?php foreach($careerList as $career):?>
            <option value=<?=$career['CareerId']?>><?=$career['CareerName']?></option>
        <?php endforeach?>
      </select>
      <label for="newName">Updated Name</label>
      <input type="text" name="newName" id="newName">
      <div class="form-group">
        <label for="newDescription">Updated Description</label>
        <textarea class="form-control" name="newDescription" id="newDescription" rows="3"></textarea>
      </div>
      <label for="newSalary">Updated Salary</label>
      <input type="number" name="newSalary" id="newSalary">
      <label for="newDemand">Updated Demand</label>
      <input type="text" name="newDemand" id="newDemand">
      <input id='update-submit' type="submit" name='submit' value="Update">
      <input id='delete-submit' type="submit" name='submit' value="Delete">
    </form>
        <br>
        <br>

    <form action="submitcoursechanges.php" method="post">
    <select name="SelectedCourse">
        <?php foreach($CourseList as $Course):?>
            <option value=<?=$Course['CourseId']?>><?=$Course['Name']?></option>
        <?php endforeach?>
      </select>
      <label for="newName">Updated Name</label>
      <input type="text" name="newName" id="newName">
      <div class="form-group">
        <label for="newDescription">Updated Description</label>
        <textarea class="form-control" name="newDescription" id="newDescription" rows="3"></textarea>
      </div>
      <input id='update-submit' type='submit' name='submit' value='Update'>
      <input id='delete-submit' type='submit' name='submit' value='Delete'>
    </form>
  <?php require '../Templates/FileUpbottomnavbar.php'?>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>