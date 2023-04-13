<?php
    include_once('base_controller.php');
    class managerController extends baseController {
        //display home page UI for guest
        function station_list() {
            include("model\station_db.php");
            if (!isset($_SESSION)) session_start();
            if (isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] == 'manager'){
                $data = array("stationList" => getStationList());
                $this->render("view\html\UI_manager\station_list", $data);
            }
            else header("Location: home_page");
        }
        
        function home_page_manager() {
            if (!isset($_SESSION)) session_start();
            if (isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] == 'manager')
                header("Location: /station_list");
            else header("Location: /guest/home_page");
        }

        function station_detail() {
            include("model\bike_db.php");
            include('model/station_db.php');
            if (!isset($_SESSION)) session_start();
            if (isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] == 'manager'){
                $data = array('bikeList' => getBikeList($_GET['stationID']),
                              'stationName' => getStationName($_GET['stationID']));
                $_SESSION['currStationName'] = getStationName($_GET['stationID']);
                $_SESSION['currStationID'] = $_GET['stationID'];
                //render view
                $this->render("view\html\UI_manager\station_detail", $data);
            }
            else header("Location: index.php?controller=guest&action=home_page");
        }

        function revenue() {
            $this->render("view/html/UI_manager/revenue");
        }

        function logout() {
            //logout
            if (!isset($_SESSION)) session_start();
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
            if (!isset($_SESSION)) session_start();
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
            if (!isset($_SESSION)) session_start();
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

        function bike_detail() {
            include('model\bike_db.php');
            if (!isset($_SESSION)) session_start();
            $bikeObj = getBike($_GET['bikeID']);
            if ($bikeObj == 'invalid id') {
                echo 'wrong id';
                exit;
            }
            else {
                $data = array('bikeObj' => $bikeObj);
                $this->render('view\html\UI_manager\bike_detail', $data);
            }

        }
    }
?>