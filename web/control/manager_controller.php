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
    }
?>