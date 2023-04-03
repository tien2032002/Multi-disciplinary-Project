<!-- database -->
<?php
    $servername = "localhost";

    $username_db = "root";
    $password_db = "";
    $dbName = "database";

    $con = new mysqli($servername, $username_db, $password_db, $dbName = "test");

    if ($con -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
    
?>