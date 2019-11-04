<?php
/*ToDo
Add a comments table to the database
Add low lever user authentication in order to post a comment
add complementary color to background of non-html elements
Impliment PHP to pull comments from previous students
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
    <div id='Selection'>
      <a name="sendToCareers" class="btn btn-primary" href="CareerHomePage.php" role="button">Click here to see a overview of Careers</a>
      <a name="sendToCourses" class="btn btn-primary" href="CoursesHomePage.php" role="button">Click here to see a overview of Courses</a>
    </div>

    <br>
    <br>

    <div id='CommentContainer'>
    <h5>Have a commment about some data we are presenting?</h5>
      <a name="sendToComments" class="btn btn-primary" href="CreateComment.php" role="button">Click here to create a new post</a>
      <a name="sendToNewUser" class="btn btn-primary" href="Register.php" role="button">Click here to register for an account</a>
      <div id='Comments'>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>