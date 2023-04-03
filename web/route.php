<?php
    //list of controllers and action
    $controllers = array('guest' => ['home_page'],
                         'manager' => ['login', 'logout', 'home_page_manager', 'bike_detail', 'enviroment', 'revenue', 'station_detail', 'station_list']);
    //if controller or action not in above list, go to error page
    if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
        $controller = 'user';
        $action = 'error';
    }

    //execute action
    include_once('control/' . $controller . '_controller.php');
    $klass = $controller . 'Controller';
    $controller = new $klass;
    $controller->$action();
?>
