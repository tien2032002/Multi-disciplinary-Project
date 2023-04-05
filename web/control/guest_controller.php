<?php
    include_once('base_controller.php');
    class guestController extends baseController {
        //display home page UI for guest
        function home_page() {
            $this->render("view\html\UI_guest\home_page");
        }
        
    }
?>