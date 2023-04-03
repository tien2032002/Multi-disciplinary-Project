<?php
    //connect to database
    require('model/db.php');

    //link to controller and execute function according to action
    if (isset($_GET['controller'])) {
        $controller = $_GET['controller'];
        if (isset($_GET['action'])) {
          $action = $_GET['action'];
        } else {
          $action = 'index';
        }
      } 
      //default controller is guest and action is home_page
  else {
        $controller = 'guest';
        $action = 'home_page';
      }
      require_once('route.php');
?>