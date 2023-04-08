<?php
    include_once('base_controller.php');
    class guestController extends baseController {
        //display home page UI for guest
        
        function home_page() {
            if (isset($_SESSION["id"]) && isset($_SESSION['role']) && $_SESSION['role'] == 'manager') 
                header("Location: index.php?controller=manager&action=home_page_manager");
            $this->render("view\html\UI_guest\home_page");
        }
        
    }
?>