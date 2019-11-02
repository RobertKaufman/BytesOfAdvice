<?php
    define('DB_DSN','mysql:host=localhost;dbname=bitcareers;charset=utf8');
    define('DB_USER','Administrator');
    define('DB_PASS','Password01');     

    // Create a PDO object called $db.
    $db = new PDO(DB_DSN, DB_USER, DB_PASS); 
?>