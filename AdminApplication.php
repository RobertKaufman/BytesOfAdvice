<?php 
    include 'connect.php';
    $AttemptedName = filter_input(INPUT_POST, 'UserName', FILTER_SANITIZE_SPECIAL_CHARS);
    $AttemptedPass = filter_input(INPUT_POST, 'UserPass', FILTER_DEFAULT);
    $AttemptedEmail = filter_input(INPUT_POST, 'UserEmail', FILTER_SANITIZE_EMAIL);
    $userExists = false;
    $SuccessFlag = false;
    $userExists = false;


//automatically log in a user if they successfully create an account
try{
  //pull all the user name records
  //and match it the attempted one in the collection to see if it already exists. if it does, set successflag to false

  //make sure the user exists
  $getUserNamesStatment = "SELECT UserName, Password, Admin FROM users";
  $checkPDO = $db->prepare($getUserNamesStatment);
  $checkPDO->execute();
  while($checkUser = $checkPDO->fetch())
  {
    if($AttemptedName == $checkUser['UserName'] && $AttemptedPass == $checkUser['Password'])
    {
      $userExists = True;
      $_SESSION['Authenticated'] = "true";
      $_SESSION['CurrentUser'] = $AttemptedName;

      //if the user is denoted as a admin user in the database, set a session variable to denote them as an admin
      if(isset($checkUser['Admin']))
      {
        $_SESSION['AdminUser'] = 'true';
        $outputString = "you are already an Admin";
      }
      
    }
  }

  //update the users tab to be admin and to have an email
  if($userExists == true)
  {
      $insertString = 'UPDATE users SET Email = :email, Admin = :true WHERE UserName = :providedName';
      $insertPDO = $db->prepare($insertString);
      $dataBind = [ 'email' => $AttemptedEmail, 'true' => TRUE,  'providedName' => $AttemptedName];                      
      $insertPDO->execute($dataBind);
      $SuccessFlag = true;
      $outputString = "your admin application was sucessful";
      $_SESSION['AdminUser'] = 'true';

 
  }
  else{
      $outputString = "you need to make an account before proceeding";
  }



}
catch(PDOException $e)
{
  $outputString = "something went wrong. so so wrong";
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
  </head>
  <body>  <div id='ContentHeading'>
      <i class="fa fa-align-center" aria-hidden="true"><h3>Bit Career Recommendations!</h3></i>
   </div>
    <?php require 'Templates/topnavbar.php';?>
    <p> Congrats <?=$AttemptedName?> <?= $outputString?>, we can reach you at <?=$AttemptedEmail?></p>
    <?php require 'Templates/bottomnavbar.php';?>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>