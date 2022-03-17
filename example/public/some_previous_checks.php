<?php

//autoloader to check user and article's controllers type
spl_autoload_register(function ($class) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, strtolower($class)) . '.php';
    $file= dirname(__FILE__) .DIRECTORY_SEPARATOR. '..'.DIRECTORY_SEPARATOR.$file;
    if (file_exists($file)) {
        require_once $file;
        return true;
    }
    return false;
});

// check if user and article's controller are of the same type.
$userTypePath= get_parent_class('\modules\user\Controller');
$userType = substr($userTypePath, strrpos($userTypePath, "\\") + 1);
$articleTypePath= get_parent_class('\modules\article\Controller');
$articleType = substr($articleTypePath, strrpos($articleTypePath, "\\") + 1);

echo "\nvar error= false;";

if ($articleType != $userType) {
    echo "\nerror= 'User controller is of type <b>$userType</b> and Article controller of <b>$articleType</b>. <br>They must be the same type of controller.';";
}

//allow front end to know controllers' type
echo "\nvar controllerType= '$userType';";
