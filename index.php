<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

/*

 On the main page you can pick up all Dutch-language films. Make sure you can easily choose another language through a parameter.
 Clicking on a movie takes you to the detail page where you show title, poster and description.

 If no characters are found for the fim you show a message
*/


require_once "../vendor/autoload.php";
require_once "./bootstrap/database.php";

/* NEW: require the router  */
require_once "./bootstrap/router.php";

$controllerName = $route['controller'] . 'Controller';

require_once __DIR__ . '/controller/' . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->route = $route;
$controllerObj->filter();
$controllerObj->render();
