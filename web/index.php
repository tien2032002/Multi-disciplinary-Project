<?php
    include('model\make_url.php');
    session_start();
    
    //connect to database
    require('model/db.php');
    echo '<base href="http://localhost/">';
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
        if (isset($_SESSION['role'])) {
          switch ($_SESSION['role']) {
            case 'manager':
              $controller = 'manager';
              if (!isset($_GET['action'])) $action='home_page_manager';
              else $action = $_GET['action'];
              break;
            case 'employee':
              if (!isset($_GET['action'])) $action='home_page_employee';
              else $action = $_GET['action'];
              $controller = 'employee';
              break;
            default:
              $controller = 'guest';
              if (!isset($_GET['action'])) $action='home_page';
              else $action = $_GET['action'];
              
              break;
          }
        }
        else {
          $controller = 'guest';
          if (isset($_GET['action'])) $action = $_GET['action'];
          else $action = 'home_page';
        }
        
      }
      
      require_once('route.php');
?>