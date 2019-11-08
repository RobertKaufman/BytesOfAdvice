<?php

//php auth user is what the user is inputting
//create functions to return bool values if the password and username successfully

require 'connect.php';


//sanitize this beforehand
$getUserNamesStatment = "SELECT UserName, Password FROM users WHERE Username = :providedName AND Password = :providedPass";
$checkPDO = $db->prepare($getUserNamesStatment);
$checkPDO->bindValue(":providedName", $_SERVER['PHP_AUTH_USER']);
$checkPDO->bindValue(":providedPass", $_SERVER['PHP_AUTH_PW']);
$checkPDO->execute();
if($checkPDO->rowCount() > 0)
{
    define('USER_LOGIN', $_SERVER['PHP_AUTH_USER']);
    define('USER_PASSWORD', $_SERVER['PHP_AUTH_PW']);
}

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])

    || ($_SERVER['PHP_AUTH_USER'] != USER_LOGIN)

    || ($_SERVER['PHP_AUTH_PW'] != USER_PASSWORD)) {

  header('HTTP/1.1 401 Unauthorized');

  header('WWW-Authenticate: Basic realm="Our Blog"');

  exit("Access Denied: Username and password required.");

}

?>