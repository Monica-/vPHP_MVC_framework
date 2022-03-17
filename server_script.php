<?php

//if the url has a '.',  the file will be served from public folder
//otherwise, the URI will be processed
if (preg_match('/\./', $_SERVER["REQUEST_URI"])) {
    return false;
} else {
    include './index.php';
}
