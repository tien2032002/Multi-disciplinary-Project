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

    function getStationByID($id) {
        //this function will return json code for station object according to id variable
        //if id not found return invalid id
        require('model/db.php');
        $searchStation = "SELECT * FROM station WHERE id='$id'";
        $resultStation = mysqli_query($con, $searchStation);
        if (mysqli_num_rows($resultStation) == 0) return "invalid id";
        else return json_encode($resultStation->fetch_object());

    }

    function updateStation($curID, $id, $name, $started_date, $capacity, $num_of_bikes, $address, $status) {
        require('db.php');
        //update station's information to database
        if (getStationByID($curID) == 'invalid id') return "fail";
        $curStation = json_decode(getStationByID($curID));
        if ($curStation->id != $id) mysqli_query($con, "UPDATE station
                                                        SET id='$id'
                                                        WHERE id=$curID");
        if ($curStation->name != $name) mysqli_query($con, "UPDATE station
                                                        SET name='$name'
                                                        WHERE id=$curID");
        if ($curStation->started_date != $started_date) mysqli_query($con, "UPDATE station
                                                        SET started_date='$started_date'
                                                        WHERE id=$curID");
        if ($curStation->capacity != $capacity) mysqli_query($con, "UPDATE station
                                                        SET capacity='$capacity'
                                                        WHERE id=$curID");
        if ($curStation->num_of_bikes != $num_of_bikes) mysqli_query($con, "UPDATE station
                                                        SET num_of_bikes='$num_of_bikes'
                                                        WHERE id=$curID");
        if ($curStation->address != $address) mysqli_query($con, "UPDATE station
                                                        SET address='$address'
                                                        WHERE id=$curID");     
        if ($curStation->status != $status) mysqli_query($con, "UPDATE station
                                                        SET status='$status'
                                                         WHERE id=$curID");                                            
    }

    function addStation($id, $name, $started_date, $capacity, $num_of_bikes, $address, $status) {
        //add station to database
        require('db.php');
        $addStation = "INSERT INTO station (id, name, started_date, capacity, num_of_bikes, address, revenue, status)
                   VALUE ('$id', '$name', '$started_date', '$capacity', '$num_of_bikes', '$address', 0, '$status')";
        mysqli_query($con, $addStation);
    }

    function checkUpdateStation($curID, $id, $name, $started_date, $capacity, $num_of_bikes, $address, $status) {
        //this function will check information of update station form is valid or not
        //if invalid, return array of error code
        //if information is ok, return good
        require('model/db.php');

        //get current employee
        $curStation = json_decode(getStationByID($curID));

        //check id

        if ($curID != $id && getStationByID($id) != "invalid id") $idErr = "duplicate";
        else if (strlen($id) == 0) $idErr = "missing";
        else $idErr = "good";

        //check name
        if (strlen($name) < 8) $nameErr = "invalid";
        else $nameErr = "good";

        //check capacity
        if (strlen($capacity) == 0) $capacityErr = "invalid";
        else $capacityErr = "good";

        //check number of bikes
        if (strlen($num_of_bikes) == 0) $num_of_bikesErr = "invalid";
        else $num_of_bikesErr = "good";

        //check address
        if (strlen($address) < 8) $addressErr = 'invalid';
        else $addressErr = "good";

        //check cmnd
        if (strlen($status) == 0) $statusErr = "invalid";
        else $statusErr = "good";

        if ($idErr == "good" && $nameErr == "good" &&  $capacityErr == "good" &&
            $num_of_bikesErr == "good" && $addressErr == "good" &&  $statusErr == "good") 
            $checkAll = 1;
        else $checkAll = 0;

        $errResult = array ("idErrUpd" => $idErr,
                            "nameErrUpd" => $nameErr,
                            "capacityErrUpd" => $capacityErr,
                            "num_of_bikesErrUpd" => $num_of_bikesErr,
                            "addressErrUpd" => $addressErr,
                            "statusErrUpd" => $statusErr,
                            );
        $result = array ("errResultUpd" => json_encode($errResult),
                         "checkAll" => $checkAll);
        return $result;
    }

    function checkAddStation($id, $name, $started_date, $capacity, $num_of_bikes, $address, $status) {
        //this function will check information of update station form is valid or not
        //if invalid, return array of error code
        //if information is ok, return good
        require('model/db.php');

        //check id

        if (getStationByID($id) != "invalid id") $idErr = "duplicate";
        else if (strlen($id) == 0) $idErr = "missing";
        else $idErr = "good";

        //check name
        if (strlen($name) < 8) $nameErr = "invalid";
        else $nameErr = "good";

        //check capacity
        if (strlen($capacity) == 0) $capacityErr = "invalid";
        else $capacityErr = "good";

        //check number of bikes
        if (strlen($num_of_bikes) == 0) $num_of_bikesErr = "invalid";
        else $num_of_bikesErr = "good";

        //check address
        if (strlen($address) < 8) $addressErr = 'invalid';
        else $addressErr = "good";

        //check status
        if (strlen($status) == 0) $statusErr = "invalid";
        else $statusErr = "good";

        if ($idErr == "good" && $nameErr == "good" &&  $capacityErr == "good" &&
            $num_of_bikesErr == "good" && $addressErr == "good" &&  $statusErr == "good") 
            $checkAll = 1;
        else $checkAll = 0;

        $errResult = array ("idErrAdd" => $idErr,
                            "nameErrAdd" => $nameErr,
                            "capacityErrAdd" => $capacityErr,
                            "num_of_bikesErrAdd" => $num_of_bikesErr,
                            "addressErrAdd" => $addressErr,
                            "statusErrAdd" => $statusErr,
                            );
        $result = array ("errResultAdd" => json_encode($errResult),
                         "checkAll" => $checkAll);
        return $result;
    }
?>