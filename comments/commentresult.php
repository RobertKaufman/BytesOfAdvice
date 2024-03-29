<?php
    require '../authenticateuser.php';
    $submittingUser = $_SESSION['CurrentUser'];
    $submittedPost = filter_input(INPUT_POST, 'usercomment', FILTER_SANITIZE_SPECIAL_CHARS);
    $sendingPage = $_SESSION['SendingPage'];
    $sessionCaptcha = $_SESSION['captcha_code'];
    $userCaptcha = filter_input(INPUT_POST, 'captcha_code', FILTER_SANITIZE_STRING);
  if($sessionCaptcha == $userCaptcha){
    try{
        $commentString = "INSERT INTO comments (comment,page,user) VALUES (:comment, :page, :user)";
        $insertPDO = $db->prepare($commentString);
        $bindValues = ['comment' => $submittedPost, 'page' => $sendingPage, 'user' =>$submittingUser];
        $insertPDO->execute($bindValues);
        $successFlag = true;

    }
    catch(PDOException $e)
    {
      print("Error: " . $e.getMessage());
      die();//i like the name ok???
    }
  }
  else
  {
    $successFlag = false;
    ECHO "incorrect captcha. Do better, lousy meatbag";
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
  <div id='ContentHeading'>
      <i class="fa fa-align-center" aria-hidden="true"><h3>Bit Career Recommendations!</h3></i>
   </div>
   <div id='Content'>
    </div>
    <?php require '../Templates/FileUptopnavbar.php';?>
    <?php if($successFlag == true):?>
        <p>Comment successfully added. Go back now!</p>
    <?php else:?>
        <p>Something went wrong. Try again?</p>
    <?php endif ?>


    <?php require '../Templates/FileUpbottomnavbar.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>