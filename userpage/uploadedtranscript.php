<?php
    require '../authenticateuser.php';
    require '../vendor/autoload.php';
    $transcript = $_POST['transcript'];
    $storageFile = new \Upload\Storage\FileSystem('../transcripts');
    $uploadedFile = new \Upload\File('transcript', $storageFile);
    $currentUser = $_SESSION['CurrentUser'];
    $outputString = 'what did you expect?';

    $uploadedFile->addValidations(array(
      // Ensure file is of type "image/png"
      //new \Upload\Validation\Mimetype('image/png'),
  
      //You can also add multi mimetype validation
      new \Upload\Validation\Mimetype(array('image/png', 'application/pdf')),
  
      // Ensure file is no larger than 5M (use "B", "K", M", or "G")
      new \Upload\Validation\Size('5M')
  ));
// Try to upload file
try {
  // Success!
  $uploadedFile->upload();
  $path = $uploadedFile->getNameWithExtention();
  $insertString = 'INSERT INTO transcripts (user, filepath) VALUES (:user, :filepath)';
  $insertPDO = $db->prepare($insertString);
  $insertPDO->bindValue(':user', $currentUser);
  $insertPDO->bindValue(':filepath', $path);
  $insertPDO->execute();
  $outputString = 'success';
  
} catch (\Exception $e) {
  // Fail!
  $errors = $file->getErrors();
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
  <?php require '../Templates/FileUptopnavbar.php'?>
  <?= $outputString?>
  <?php require '../Templates/FileUpbottomnavbar.php'?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>