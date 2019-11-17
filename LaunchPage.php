<?php
/*ToDo
Add a comments table to the database
Add low lever user authentication in order to post a comment
add complementary color to background of non-html elements
Impliment PHP to pull comments from previous students
*/
    require 'connect.php';

    $allBlogs = "SELECT * FROM comments WHERE page='LaunchPage' ORDER BY commentpk DESC LIMIT 5";
    $fetchStatement = $db->prepare($allBlogs); // Returns a PDOStatement object.
    $fetchStatement->execute(); // The query is now executed.
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
        <i class="fas fa-centercode "><p> This is a website with a really simple purpose. To help BIT students pick their term 5 electives based off 
        the careers that they want to presue. Take a while to look at see through all the prepared careers, and make a comment if you think any of the information
        can be improved.</i>
    </div>
    <div id='searchbar'> 
    <div class="form-check">
    <form action="searchsite.php" method='post'>
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="department" id="department" value="career" checked>
        Careers
      </label>
      <p>_________<p>
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="department" id="department" value="courses" checked>
        Courses
      </label>
      <p>_________<p>
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="department" id="department" value="comments" checked>
        Comments
      </label>
      <div class="form-group">
        <label for=""></label>
        <input type="text" class="form-control" name="searchtext" id="searchtext" aria-describedby="helpId" placeholder="what are you looking for?">
        <small id="helpId" class="form-text text-muted">keyword to search</small>
      </div>
      <input type="submit" value="Submit">
    </form>
    </div>
    </div>
    <?php require 'Templates/topnavbar.php';?>

    <div id='CommentContainer'>
    <h5>Have a commment about some data we are presenting?</h5>
    <form id='launchcomment'>
    <button name='launchcomment' formid='launchcomment' type="submit" formaction='comments/CreateLaunchComment.php' formmethod='post' class="btn btn-primary">Leave a comment</button>
      <!--<a name="sendToComments" class="btn btn-primary" href="CreateLaunchComment.php" role="button">Click here to create a new post</a>-->
      <a name="sendToNewUser" class="btn btn-primary" href="CreateAccount.php" role="button">Click here to register for an account</a>
    </form>
    <br>
      <div id='Comments'>
      <?php while ($comment = $fetchStatement->fetch()): ?>
        <p> Posted by: <?= $comment['user']?> </p>
        <p><?= $comment['comment']?></p>
        <br>
        <?php endwhile ?>
      </div>
    </div>
        <?php require 'templates/bottomnavbar.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>