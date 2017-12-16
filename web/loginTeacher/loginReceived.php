<?php

require_once __DIR__."/loginController.php";

$controller = new loginController();
$result = $controller->checkLogin();

echo json_encode($result);
 ?>
