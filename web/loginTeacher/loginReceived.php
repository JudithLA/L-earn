<?php

require_once __DIR__."/loginController.php";
header('Access-Control-Allow-Origin: *');

$controller = new loginController();
$result = $controller->checkLogin();

echo json_encode($result);
 ?>
