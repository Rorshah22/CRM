<?php

spl_autoload_register(function (string $className) {
    require_once __DIR__ . '/../' . str_replace('\\', '/', $className).'.php';
});
$route = $_GET['route'] ?? '';
$routes = require_once __DIR__ . '/../Core/routes.php';

$isRouteFound = false;
foreach ($routes as $pattern => $controllerAndAction) {
    preg_match($pattern, $route, $matches);
    if (!empty($matches)) {
        $isRouteFound = true;
        break;
    }
}

unset($matches[0]);

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];
$controller = new $controllerName();
$controller->$actionName(...$matches);
