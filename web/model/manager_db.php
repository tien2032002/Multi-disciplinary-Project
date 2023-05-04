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
        require('model/db.php');
        $employeeQuery = mysqli_query($con, "SELECT * FROM users WHERE role='maintenance staff'");
        $employeeList = array();
        while ($row = $employeeQuery->fetch_object()){
            $employeeList[] = $row;
        }
        return $employeeList;
    }

    function getUserById() {
        require('model/db.php');
        $getUser = mysqli_query($con, "SELECT * FROM users WHERE id='$id'");
        $userObj = $getManager->fetch_object();
        return $userObj;
    }

    function check_add_employee($id, $name, $phone, $email, $address){
        require('model/db.php');
        if ($id == '') $idErr = 'missing';
        else if (getUserById($id) != NULL) $idErr = 'dupplicate';
        else $idErr = 'good';

        if ($name == '') $nameErr = 'missing';
        else $nameErr = 'good';

        if ($phone == '') $phoneErr = 'missing';
        else $phoneErr = 'good';

        if ($email == '') $emailErr = 'missing';
        else $emailErr = 'good';

        if ($address == '') $addressErr = 'missing';
        else $addressErr = 'good';

        if ($idErr == 'good' && $nameErr = 'good' && $phoneErr = 'good' && $emailErr = 'good' && $addressErr = 'good') $checkAll = 1;
        else $checkAll = 0;

        $errList = array('idErr' => $idErr,
                         'nameErr' => $nameErr,
                         'phoneErr' => $phoneErr,
                         'emailErr' => $emailErr,
                         'addressErr' => $addressErr,
                         'checkAll' => $checkAll);
        
        return $errList;
    }

    function add_employee_db($id, $name, $phone, $email, $address) {
        require('model/db.php');
        mysqli_query($con, "INSERT INTO user (id, name, password, phone_num, email, address, role)
                            VALUES ()");
    }
?>