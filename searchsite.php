<?php

    include 'connect.php';

    $attemptedSearchBarText = filter_input(INPUT_POST, 'searchtext', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $searchTable = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_STRING);


        /*CareerName
        CareerDescription
        CareerDemand
        CareerSalary*/
    if($searchTable == 'career')
    {
        $selectString = 'SELECT * FROM career WHERE CareerName LIKE :searchText OR CareerDescription LIKE :searchText OR CareerDemand LIKE :searchText OR CareerSalary LIKE :searchText';
        $searchPDO = $db->prepare($selectString);
        $searchPDO->bindValue(':searchText', ('%'.$attemptedSearchBarText.'%'));
        $searchPDO->execute();
    }
    elseif($searchTable == 'courses')
    {
        $selectString = 'SELECT * FROM courses WHERE Name LIKE :searchText OR Description LIKE :searchText';
        $searchPDO = $db->prepare($selectString);
        $searchPDO->bindValue(':searchText', ('%'.$attemptedSearchBarText.'%'));
        $searchPDO->execute();

    }
    elseif($searchTable == 'comments')
    {
        $selectString = 'SELECT * FROM comments WHERE comment LIKE :searchText OR user LIKE :searchText OR page LIKE :searchText';
        $searchPDO = $db->prepare($selectString);
        $searchPDO->bindValue(':searchText', ('%'.$attemptedSearchBarText.'%'));
        $searchPDO->execute();
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
  <?php include 'Templates/topnavbar.php'?>
    <p> we found the following results in the <?= $searchTable?> page for the term <?=$attemptedSearchBarText?></p>
    <?php
        //while
        ($result = $searchPDO->fetchAll())        
    ?>
        <p> <?php foreach($result as $BigContent):?>
        <?= print_r($BigContent)?>
          <?php foreach($BigContent as $title => $content):?>
            Title:  <?php $title?>
            Content:  <?php $content?></p>
            <?php endforeach?>
        <?php endforeach;?>
      <?php //endwhile?>

  <?php include 'Templates/bottomnavbar.php'?>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>