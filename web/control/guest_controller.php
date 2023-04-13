<?php
    include_once('base_controller.php');
    class guestController extends baseController {
        //display home page UI for guest
        
        function home_page() {
            if (!isset($_SESSION)) session_start();
            if (isset($_SESSION["id"]) && isset($_SESSION['role']) && $_SESSION['role'] == 'manager') 
                header("Location: index.php?controller=manager&action=home_page_manager");
            $this->render("view\html\UI_guest\home_page");
        }
        
        function login(){
            //login to manager account
            include('model\manager_db.php');
            
            $loginErr = checkLogin($_POST['id'], $_POST['password']);
            if ($loginErr == 'good') {
                if (!isset($_SESSION)) session_start();
                $_SESSION['id'] = $_POST['id'];
                $_SESSION['role'] = 'manager';
                header('Location: /manager/home_page_manager');
            }
            else  {
                $data = array ('loginErr' => $loginErr);
                $this->render('view\html\UI_guest\home_page', $data);
            }
        }
    }
?>