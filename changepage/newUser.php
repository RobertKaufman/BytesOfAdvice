<?php
    require '../authenticateAdmin.php';
/*      <label for="newUserName">New User Name:</label>
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
    </div>*/
    $AttemptedName = filter_input(INPUT_POST, 'newUserName', FILTER_SANITIZE_STRING);
    $AttemptedPass = filter_input(INPUT_POST, 'newUserPass', FILTER_SANITIZE_STRING);
    $attemptedPassCheck = filter_input(INPUT_POST, 'newUserPass2', FILTER_SANITIZE_STRING);
    $AttemptedEmail = filter_input(INPUT_POST, 'newUserEmail', FILTER_SANITIZE_EMAIL);
    $isAdmin = filter_input(INPUT_POST, 'admin', FILTER_VALIDATE_BOOLEAN);
    $SuccessFlag = true;
    $userExists = false;
    $userCreationString = 'Unsuccessful';

    try{
      //pull all the user name records
      //and match it the attempted one in the collection to see if it already exists. if it does, set successflag to false
    
      $getUserNamesStatment = "SELECT UserName FROM users";
      $checkPDO = $db->prepare($getUserNamesStatment);
      $checkPDO->execute();
      while($checkName = $checkPDO->fetch())
      {
        if($AttemptedName == $checkName['UserName'])
        {
          $SuccessFlag = false;
          ECHO "User Name already taken. Try another!";
        }
      }
      if($AttemptedPass != $attemptedPassCheck)
      {
        $SuccessFlag = false;
        ECHO "Passwords did not match. please try again!";
      }
      if($SuccessFlag == true)
      {
        $newUserData = "INSERT INTO users (UserName, Password, Email) VALUES (:username, :password, NULL)";
        $insertPDO = $db->prepare($newUserData);
        $insertPDO->bindValue(':username', $AttemptedName);
        $insertPDO->bindValue(':password', $AttemptedPass);
        $insertPDO->execute();
        $userCreationString = 'User successfully created';
      }

      if($isAdmin == true)
      {
        $getUserNamesStatment = "SELECT UserName, Password, Admin FROM users";
        $checkPDO = $db->prepare($getUserNamesStatment);
        $checkPDO->execute();
        while($checkUser = $checkPDO->fetch())
        {
          if($AttemptedName == $checkUser['UserName'] && $AttemptedPass == $checkUser['Password'])
          {
            $userExists = True;
      
            //if the user is denoted as a admin user in the database, set a session variable to denote them as an admin
            if(isset($checkUser['Admin']))
            {
              $outputString = "user is already an Admin";
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
            $outputString = "Admin creation was sucessful";
      
       
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
  </head>
  <body>

  <p> <?=$userCreationString?>, <?$outputString?><p>
  <?php require '../Templates/FileUptopnavbar.php'?>
  <?php require '../Templates/FileUpbottomnavbar.php'?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>