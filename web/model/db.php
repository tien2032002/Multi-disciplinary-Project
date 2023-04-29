<!-- database -->
<?php
    $servername = "localhost";

    $username_db = "root";
    $password_db = "";
    $dbName = "byciclegas";

    $con = new mysqli($servername, $username_db, $password_db, $dbName);

    if ($con -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
    
?>