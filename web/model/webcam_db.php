<?php
    function get_frame() {
        require('model/db.php');
        return mysqli_query($con, "SELECT * FROM webcam")->fetch_object();
    }
?>
