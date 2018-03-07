<?php 
require_once __DIR__ . "/teacherTestsController.php";

if (!isset($_SESSION)){session_start();}

if(!empty($_GET)) {
	$action = $_GET ['action'];
    $teacherTests = new TeacherTestsController();
    $result = $teacherTests->$action();
    echo json_encode($result); 
	return;
}else{
	$view = new TeacherTestsController();
	echo $view->showViewTeacherTests();
}

 ?>