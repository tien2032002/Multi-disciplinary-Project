<?php
    //manage station data

    function getStationList() {
        //this function will return json code of station list object array
        require('model/db.php');
        $getList = "SELECT * FROM station";
        $resultList = mysqli_query($con, $getList);
        $arrayList = array();
        while ($row = $resultList->fetch_object()) {
            $arrayList[]=json_encode($row);
        }
        return json_encode($arrayList);
    }

    function getStationInfo($stationID) {
        //this function will return json code of station object according to station ID
        $getStation = "SELECT * FROM station WHERE id == '$stationID'";
        $resultStation = mysqli_query($con, $getList);
        return json_encode($resultStation->fetch_object());
    }
?>