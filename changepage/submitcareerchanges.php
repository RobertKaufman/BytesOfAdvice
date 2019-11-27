<?php
    require '../authenticateAdmin.php';
    $providedSalary = filter_input(INPUT_POST, 'newSalary', FILTER_SANITIZE_NUMBER_INT);
    $providedName = filter_input(INPUT_POST, 'newName', FILTER_SANITIZE_SPECIAL_CHARS);
    $providedDemand = filter_input(INPUT_POST, 'newDemand', FILTER_SANITIZE_SPECIAL_CHARS);
    $providedDescription = filter_input(INPUT_POST, 'newDescription', FILTER_SANITIZE_SPECIAL_CHARS);
    $providedPrimaryKey = filter_input(INPUT_POST, 'careers', FILTER_SANITIZE_NUMBER_INT);
    $requestedFunction = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_SPECIAL_CHARS);

    function validate_update_data($salary, $name, $demand, $description, $pk)
    {
        if(!(isset($salary)))
        {
            ECHO 'Salary Issue';
            return false;
        }
        else if(!(isset($name)))
        {
            ECHO 'Name issue';
            return false;
        }
        else if(!(isset($demand)))
        {
            ECHO 'Demand Issue';
            return false;
        }
        else if(!(isset($description)))
        {
            ECHO 'Description issue';
            return false;
        }
        else if(!(isset($pk)))
        {
            ECHO 'PK issue';
            ECHO $pk;
            return false;
        }
        else if($salary <= 0)
        {
            ECHO 'Salary Issue';
            return false;
        }
        else
            return true;

        
    }
    if($requestedFunction == 'Update')
    {
        $valid_data = validate_update_data($providedSalary, $providedName, $providedDemand, $providedDescription, $providedPrimaryKey);
        $insertString = "UPDATE career SET CareerDemand = :demand, CareerDescription = :description, CareerName = :name, CareerSalary = :salary WHERE CareerId = :pk ";
        $insertStatement = $db->prepare($insertString);
        $bindValues = ['demand' => $providedDemand, 'description' => $providedDescription, 'name' => $providedName, 'salary' => $providedSalary, 'pk' => $providedPrimaryKey];
        if($valid_data)
        {
            $insertStatement->execute($bindValues);
            $sucessFlag = true;
        }

    }
    if($requestedFunction == 'Delete')
    {
        if(isset($providedPrimaryKey))
        {
            $deleteString = 'DELETE FROM career WHERE CareerId = :pk';
            $deleteStatement = $db->prepare($deleteString);
            $deleteStatement->bindValue(':pk', $providedPrimaryKey);
            $deleteStatement->execute();
            $sucessFlag = true;
        }
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
  <?php require '../Templates/FileUpbottomnavbar.php'?>
  <?php if(isset($sucessFlag)):?>
    <p>Transaction successful!</p>
  <?php else: ?>
    <p>Transaction not completed<p>
  <?php endif ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>