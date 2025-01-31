<?php
require_once __DIR__ . "/../controllers/AuthController.php";

$routes = [
    "login" => "AuthController@login",
    "logout" => "AuthController@logout",
    "register" => "AuthController@register"
];

if (!isset($_GET['url']) || empty($_GET['url'])) {
    header("Location: login");
    exit();
}

if ($_GET['url'] === "dashboard") {
    require_once __DIR__ . "/../views/dashboard.php";
    exit();
}

if (array_key_exists($_GET['url'], $routes)) {
    $route = explode("@", $routes[$_GET['url']]);
    $controller = new $route[0]();
    $method = $route[1];
    $controller->$method();
} else {
    echo "Página no encontrada";
}
