<?php
    //manage bikes data

    function getBikeList($stationID) {
        require('model/db.php');
        //this function will return json code of bikes id array
        $getBikeList = "SELECT * FROM have_bikes WHERE station_id = '$stationID'";
        $resultBikeList = mysqli_query($con, $getBikeList);
        $bikeList = array();
        while ($row = $resultBikeList->fetch_object()) {
            $BikeObj = getBike($row->bike_id);
            $bikeList[] = $BikeObj;
        }
        return json_encode($bikeList);
    }

    function getBike($bikeID) {
        require('model/db.php');
        $getBike = "SELECT * FROM bike WHERE id = '$bikeID'";
        $bikeResult = mysqli_query($con, $getBike);
        return json_encode($bikeResult->fetch_object());
    }
?>