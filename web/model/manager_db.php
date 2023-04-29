<?php
    //manage manager data

    function getManagerByID($id) {
        require('model/db.php');
        $getManager = mysqli_query($con, "SELECT * FROM users WHERE id='$id'");
        $managerObj = $getManager->fetch_object();
        if (!$managerObj) return "invalid id";
        if ($managerObj->role!='manager') return 'not manager';
        return json_encode($managerObj);
    }

    function checkLogin($id, $password) {
        $searchID = getManagerByID($id);
        
        if ($searchID == "invalid id" || $searchID == "not manager") $loginErr = $searchID;
        else {
            $searchID = json_decode($searchID);
            if ($searchID->password != $password) $loginErr = 'wrong password';
            else $loginErr = "good";
        }
        return $loginErr;
    }

    function getEmployeeList() {
        //this function return json code of array employee
    }
?>