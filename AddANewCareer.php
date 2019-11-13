<?php
    include 'authenticateAdmin.php';
    /*CareerDemand
    CareerDescription
    CareerName
    CareerSalary
    */

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
  <?php require 'Templates/topnavbar.php';?>
  <div class="form-group">
  <form action="CareerCreation.php" method='post'>
    <label for="careerName"></label>
    <input type="text" class="form-control" name="careerName" id="careerName" aria-describedby="helpId" placeholder="Job Title">
    <small id="helpId" class="form-text text-muted">Title</small>
    <label for="careerSalary"></label><!--remember to parse this to an int on the other side-->
    <input type="text" class="form-control" name="careerSalary" id="careerSalary" aria-describedby="helpId" placeholder="Average Wages">
    <small id="helpId" class="form-text text-muted">Salary</small>
    <label for="careerDemand"></label><!--remember to parse this to an int on the other side-->
    <input type="text" class="form-control" name="careerDemand" id="careerDemand" aria-describedby="helpId" placeholder="Average Demand">
    <small id="helpId" class="form-text text-muted">Demand</small>
    <div class="form-group">
      <label for=""></label>
      <textarea class="form-control" name="careerDescription" id="careerDescription" rows="4"></textarea>
    </div>
    <input type="submit" value="Submit">
  </form>
  </div>
  <?php require 'templates/bottomnavbar.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>