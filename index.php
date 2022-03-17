<?php
include 'framework/tools/bootstrap.php';
include 'tools/bootstrap.php';

$globalConfig['basePath'] = __DIR__ . DIRECTORY_SEPARATOR;

//remove GET parameter from url
$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$request = explode('/', trim($url, '/'));

//find landing page
$indexPath= '.'.DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR;
$index = $indexPath . 'index.php';
if (file_exists($indexPath . 'index.php')) {
    $index = $indexPath . 'index.php';
} else {
    $index = $indexPath . 'index.html';
}


//base url redirects to the landing page
if (!isset($request[0]) || !$request[0]) {
    include $index;
    exit();
}

try {
    callController($request);
} catch (framework\exceptions\URIException $e) {
//    echo 'url error';
//    echo '<pre>', print_r($e), '</pre>';
    include $index;
    exit();
} catch (framework\exceptions\ViewException $e) {
//    echo $e->getMessage();
//    echo '<pre>', print_r($e), '</pre>';
    include $index;
    exit();
} catch (\Throwable $e) {
//    echo '<pre>', print_r($e), '</pre>';
    include $index;
    exit();
}



