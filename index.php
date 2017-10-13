<?php
session_start();
require 'config.php';
require 'classes/Route.php';
require 'classes/Controller.php';
require 'classes/Model.php';
// require 'classes/Model.php';
require 'controllers/Home.php';
require 'controllers/Share.php';
require 'controllers/User.php';

require 'models/ShareM.php';
require 'models/UserM.php';

$route = new Route($_GET);
$controller = $route->createController();
if($controller){
  $controller->executeAction();
}
?>
