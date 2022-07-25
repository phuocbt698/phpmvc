<?php
    session_start();
    ob_start();
    $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'];
    // echo '<pre>';
    // print_r($_SERVER);
    // echo '</pre>';
    define('_DIR_', __DIR__);
    define('_URL_', $url);
    require_once _DIR_ . "/core/Config.php";
    require_once _DIR_ . "/core/QueryBuilder.php";
    require_once _DIR_ . "/core/Database.php";
    require_once _DIR_ . "/core/Session.php";
    require_once _DIR_ . '/app/Controllers/BaseController.php';
    require_once _DIR_ . '/app/Models/BaseModel.php';
    require_once _DIR_ . "/app/App.php";
    require_once _DIR_ . "/core/Request.php";

    $app = new App();