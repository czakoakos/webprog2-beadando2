<?php

session_start();
if (!isset($_SESSION['userid'])) $_SESSION['userid'] = 0;
if (!isset($_SESSION['userfirstname'])) $_SESSION['userfirstname'] = "";
if (!isset($_SESSION['userlastname'])) $_SESSION['userlastname'] = "";
if (!isset($_SESSION['userlevel'])) $_SESSION['userlevel'] = "1__";

include(SERVER_ROOT . 'includes/database.inc.php');
include(SERVER_ROOT . 'includes/menu.inc.php');

$page = "home";
$subpage = "";
$vars = array();

$request = $_SERVER['QUERY_STRING'];

if ($request != "") {
    $params = explode('/', $request);
    $page = array_shift($params);

    if (array_key_exists($page, Menu::$menu) && count($params) > 0) {
        $subpage = array_shift($params);
        if (!(array_key_exists($subpage, Menu::$menu) && Menu::$menu[$subpage][1] == $page)) {
            $vars[] = $subpage;
            $subpage = "";
        }

    }
    $vars += $_POST;

    foreach ($params as $p) {
        $vars[] = $p;
    }
}

$controllerfile = $page . ($subpage != "" ? "_" . $subpage : "");
$target = SERVER_ROOT . 'controllers/' . $controllerfile . '.php';
if (!file_exists($target)) {
    $controllerfile = "PageNotFound";
    $target = SERVER_ROOT . 'controllers/page_not_found.php';
}

include_once($target);
$class = ucfirst($controllerfile) . '_Controller';
if (class_exists($class)) {
    $controller = new $class;
} else {
    die('class does not exists!');
}

$controller->main($vars);

function __autoload($className)
{
    $file = SERVER_ROOT . 'models/' . strtolower($className) . '.php';
    if (file_exists($file)) {
        include_once($file);
    } else {
        die("File '$file' containing class '$className' not found.");
    }
}

?>