<?php
chdir("..");
require_once "./base/routes.php";
require_once "./base/application.php";

$map = $_GET["map"];

foreach ($routes as $route) {
    $path = str_replace("/","\/", $route->getPath());
    if (preg_match("/".$path."/i", $map, $matches)) {
        foreach ($matches as $key => $match) {
            if (!is_int($key) && $match != "") {
                $_GET[$key] = strtolower($match);
            }
        }
        foreach ($route->getDefaults() as $key => $default) {
            if (!isset($_GET[$key])) {
                $_GET[$key] = $default;
            }
        }
        break;
    }
}

$controllerName = $_GET["controller"];
$actionName = $_GET["view"];
$controllerFile = "./controllers/".$controllerName."_controller.php";

if (file_exists($controllerFile)) {
    require $controllerFile;
    $controller = $controllerName."_controller";
    $app = new $controller();
    $app->onActionExecuting();
    if (method_exists($app, $actionName)) {
        $result = $app->$actionName();
        $app->onActionExecuted();
        $app->onResultExecuting();
        if (method_exists($result, "Execute")) {
            $result->Execute();
        }
        $app->onResultExecuted();
    } else echo "404";
} else echo "404";

?>