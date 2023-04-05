<?php
    include_once('base_controller.php');
    class managerController extends baseController {
        //display home page UI for guest
        function station_list() {
            include("model\station_db.php");
            $data = array("stationList" => getStationList());
            $this->render("view\html\UI_manager\station_list", $data);
        }
        
        function home_page_manager() {
            $this->render("view\html\UI_manager\home_page_manager");
        }

        function station_detail() {
            include("model\bike_db.php");
            //get bike list
            $data = array("bikeList" => getBikeList($_GET['stationID']));
            //render view
            $this->render("view\html\UI_manager\station_detail", $data);
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
    }
?>