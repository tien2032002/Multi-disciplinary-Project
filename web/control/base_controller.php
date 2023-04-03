<?php
    class baseController {
        //render UI function
        function render($file, $data = array()) {
            $UI_file = $file . '.php';
            if (is_file($UI_file)) {
                extract($data);
                require_once($UI_file);
            }
        }
    }
?>