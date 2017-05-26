<?php
/**
 * Created by PhpStorm.
 * User: toki
 * Date: 26/05/17
 * Time: 19.13
 */
function __autoload($class_name) {
    switch ($class_name[0]) {
        case 'V':
            require_once ('View/'.$class_name.'.php');
            break;
        case 'F':
            require_once ('Foundation/'.$class_name.'.php');
            break;
        case 'E':
            require_once ('Entity/'.$class_name.'.php');
            break;
        case 'C':
            require_once ('Controller/'.$class_name.'.php');
            break;
        case 'U':
            require_once ('Foundation/Utility/'.$class_name.'.php');
    }
}
?>