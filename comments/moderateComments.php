<?php
//have an if statement so that if the user is an admin they can see all comments
//otherwise have it only pull a particular users post
    require '../authenticateuser.php';
    if($_SESSION['AdminUser'] == 'true')
    {
        $commentsString = 'SELECT * FROM comments';
        $commentsStatement = $db->prepare($commentsString);
        $commentsStatement->execute();
    }
    else{
        $currentUser = $_SESSION['CurrentUser'];
        $commentsString = 'SELECT * FROM comments WHERE user = :currentUser';
        $commentsStatement = $db->prepare($commentsString);
        $commentsStatment->bindValue(':currentUser', $currentUser);
        $commentsStatement->execute();
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
  <table class="table">
      <thead>
          <tr>
              <th>Posted By</th>
              <th>On table</th>
              <th>comment</th>
              <th>Delete</th>
              <th>Modify comment<th>
          </tr>
      </thead>
      <tbody>
      <?php while($comment = $commentsStatement->fetch()):?>    
        <tr>
            <td scope="row"><?=$comment['user']?></td>
            <td><?=$comment['page']?></td>
            <td><?=$comment['comment']?></td>
            <td><form><button formmethod='post' formaction='deleteComment.php' id='CommentToChange' name='CommentToChange' value=<?=$comment['commentpk']?> type="submit" class="btn btn-primary">Delete Comment?</button></form></td>
            <td><form><button formmethod='post' formaction='updateComment.php' id='CommentToChange' name='CommentToChange'value=<?=$comment['commentpk']?> type="submit" class="btn btn-primary">Modify Comment?</button></form></td>
        </tr>
        <?php endwhile?>
    </tbody>
  </table>
  <?php require '../Templates/FileUpbottomnavbar.php'?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>