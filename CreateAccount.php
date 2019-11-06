<?php
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
      <i class="fa fa-align-center" aria-hidden="true"><h3>Create an account below</h3></i>
   </div>
   <div id='CreateAccountForm'>
       <div class="form-group">
            <form action='CreateUserResult.php' method='post'>
                <label for="NewUserName"></label>
                <input type="text"
                class="form-control" name="UserName" id="UserName" aria-describedby="helpId" placeholder="Be Creative!">
                <small id="helpId" class="form-text text-muted">UserName</small>
                <label for="NewUserPass"></label>
                <input type="text"
                class="form-control" name="UserPass" id="UserPass" aria-describedby="helpId" placeholder="Be Smart!">
                <small id="helpId" class="form-text text-muted">UserName</small>
                <input type="submit" value="Submit">
            </form>
       </div>
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