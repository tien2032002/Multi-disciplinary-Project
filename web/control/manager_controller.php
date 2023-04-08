<?php
    include_once('base_controller.php');
    class managerController extends baseController {
        //display home page UI for guest
        function station_list() {
            include("model\station_db.php");
            session_start();
            if (isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] == 'manager'){
                $data = array("stationList" => getStationList());
                $this->render("view\html\UI_manager\station_list", $data);
            }
            else header("Location: index.php?controller=guest&action=home_page");
        }
        
        function home_page_manager() {
            session_start();
            if (isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] == 'manager')
                header("Location: index.php?controller=manager&action=station_list");
            else header("Location: index.php?controller=guest&action=home_page");
        }

        function station_detail() {
            include("model\bike_db.php");
            session_start();
            if (isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] == 'manager'){
                //get bike list
                $data = array("bikeList" => getBikeList($_GET['stationID']));
                //render view
                $this->render("view\html\UI_manager\station_detail", $data);
            }
            else header("Location: index.php?controller=guest&action=home_page");
        }

        function revenue() {
            $this->render("view/html/UI_manager/revenue");
        }

        function login(){
            //login to manager account
            include('model\manager_db.php');
            
            $loginErr = checkLogin($_POST['id'], $_POST['password']);
            if ($loginErr == 'good') {
                session_start();
                $_SESSION['id'] = $_POST['id'];
                $_SESSION['role'] = 'manager';
                header('Location: index.php?controller=manager&action=home_page_manager');
            }
            else  {
                $data = array ('loginErr' => $loginErr);
                $this->render('view\html\UI_guest\home_page', $data);
            }
        }

        function logout() {
            //logout
            session_start();
            session_destroy();
            header("Location: index.php?controller=guest&action=home_page");

        }

        function environment() {
            $this->render("view/html/UI_manager/enviroment");
        }

        function user_webpage() {
            $this->render("view\html\UI_manager\user_webpage");
        }

        function addStation() {
            include('model\station_db.php');
            session_start();
            if (isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] == 'manager'){
                $checkAddStation = checkAddStation($_POST['stationID'], $_POST['stationName'], $_POST['stationStartedDay'],
                                                $_POST['stationCapacity'], $_POST['stationNumOfBikes'], $_POST['stationAddress'],
                                                $_POST['stationStatus']);
                extract($checkAddStation);
                if ($checkAll == 1) {
                    addStation($_POST['stationID'], $_POST['stationName'], $_POST['stationStartedDay'],
                                    $_POST['stationCapacity'], $_POST['stationNumOfBikes'], $_POST['stationAddress'],
                                    $_POST['stationStatus']);
                    header('Location: index.php?controller=manager&action=station_list');
                }
                else {
                    $data = array("stationList" => getStationList(),
                                  "errResultAdd" => $errResultAdd);
                    $this->render("view\html\UI_manager\station_list", $data);
                }
            }
        }

        function updateStation() {
            include('model\station_db.php');
            session_start();
            if (isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] == 'manager'){
                $checkUpdateStation = checkUpdateStation($_GET['curStationID'], $_POST['stationID'], $_POST['stationName'], $_POST['stationStartedDay'],
                                                $_POST['stationCapacity'], $_POST['stationNumOfBikes'], $_POST['stationAddress'],
                                                $_POST['stationStatus']);
                extract($checkUpdateStation);
                if ($checkAll == 1) {
                    updateStation($_GET['curStationID'], $_POST['stationID'], $_POST['stationName'], $_POST['stationStartedDay'],
                                    $_POST['stationCapacity'], $_POST['stationNumOfBikes'], $_POST['stationAddress'],
                                    $_POST['stationStatus']);
                    header('Location: index.php?controller=manager&action=station_list');
                }
                else {
                    $data = array("stationList" => getStationList(),
                                  "errResultUpd" => $errResultUpd,
                                'curStationID' => $_GET['curStationID']);
                    $this->render("view\html\UI_manager\station_list", $data);
                }
            }
        }
    }
?>