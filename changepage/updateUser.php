<?php
    require '../authenticateAdmin.php';
    $ripUser = filter_input(INPUT_POST, 'UserName', FILTER_SANITIZE_SPECIAL_CHARS);
    $_SESSION['PreviousUserName'] = $ripUser;

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
  <h3>Update user <?=$ripUser?></h3>
    <form action="updateUserResult.php" method="post">
    <div class="form-group">
      <label for="newUserName">New User Name:</label>
      <input type="text"
        class="form-control" name="newUserName" id="newUserName" aria-describedby="helpId" placeholder="UserName">
      <small id="helpId" class="form-text text-muted">The new users name</small>
      <label for="newUserName">New User Password:</label>
      <input type="text"
        class="form-control" name="newUserPass" id="newUserPass" aria-describedby="helpId" placeholder="User password">
      <small id="helpId" class="form-text text-muted">The new users Password</small>
      <label for="newUserName">Confirm User Password:</label>
      <input type="text"
        class="form-control" name="newUserPass2" id="newUserPass2" aria-describedby="helpId" placeholder="User password">
      <small id="helpId" class="form-text text-muted">The new users Password</small>
      <label for="newUserName">User Email</label>
      <input type="text"
        class="form-control" name="newUserEmail" id="newUserEmail" aria-describedby="helpId" placeholder="User Email">
      <small id="helpId" class="form-text text-muted">The new users Password</small>
      <label for='admin'>Admin user?</label>
      <input type="checkbox" name="admin" id="admin">
    </div>
    <input type="submit" value="Submit">
    </form>
  <?php require '../Templates/FileUpbottomnavbar.php'?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>