<?php
//look at renaming this page - confusing page name
require('connect.php');
$AttemptedName = filter_input(INPUT_POST, 'UserName', FILTER_SANITIZE_SPECIAL_CHARS);
$AttemptedPass = filter_input(INPUT_POST, 'UserPass', FILTER_DEFAULT);
$SuccessFlag = false;


//automatically log in a user if they successfully create an account
try{
  //pull all the user name records
  //and match it the attempted one in the collection to see if it already exists. if it does, set successflag to false

  $getUserNamesStatment = 'SELECT UserName, Password, Admin FROM users';
  $checkPDO = $db->prepare($getUserNamesStatment);
  $checkPDO->execute();
  while($checkUser = $checkPDO->fetch())
  {
    if($AttemptedName == $checkUser['UserName'])
    {
    if (password_verify($AttemptedPass, $checkUser['Password']))
      {
        $SuccessFlag = True;
        $_SESSION['Authenticated'] = 'true';
        $_SESSION['CurrentUser'] = $AttemptedName;

        //if the user is denoted as a admin user in the database, set a session variable to denote them as an admin
        if(isset($checkUser['Admin']))
        {
          $_SESSION['AdminUser'] = 'true';
        }
        
      }
    }
  }



}
catch(PDOException $e)
{
  print("Error: " . $e.getMessage());
  die();//i like the name ok???
}


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
  <?php require 'Templates/topnavbar.php';?>
    <?php if($SuccessFlag === true):?>
      <p>Logged in succesfully. Check out our links on the nav bars</p>
    <?php endif?>
    <?php if($SuccessFlag === false):?>
      <p>There was a problem with logging in. Please try again</p>
    <?php endif?>
    <?php require 'templates/bottomnavbar.php';?>  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>