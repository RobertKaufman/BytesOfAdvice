<?php
    define('DB_DSN','mysql:host=localhost;dbname=bitcareers;charset=utf8');
    define('DB_USER','Admin');
    define('DB_PASS','Password01');
    session_start();     

    // Create a PDO object called $db.
    $db = new PDO(DB_DSN, DB_USER, DB_PASS); 
?>