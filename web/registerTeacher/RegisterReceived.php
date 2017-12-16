<?php

require_once __DIR__."/RegisterTeacherController.php";
//echo json_encode($_POST);

//$_POST ["name"] = "Judith";
//    variable para recoger el envío de datos del usuario
//$_POST ["email"] = "judith@emailfalso.com";
//		variable para recoger el envío de datos del usuario
//$_POST ["password"] = "1234";

$controller = new RegisterTeacherController();
$result = $controller->checkRegister();

echo json_encode($result);
 ?>
