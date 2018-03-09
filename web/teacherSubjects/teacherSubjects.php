<?php 
require_once __DIR__ . "/teacherSubjectsController.php";

if (!isset($_SESSION)){session_start();}

if(!empty($_GET)) {
	$action = $_GET ['action'];
    $teacherSubjects = new TeacherSubjectsController();
    $result = $teacherSubjects->$action();
    echo json_encode($result); 
	return;
}else{
	$view = new TeacherSubjectsController();
	echo $view->showViewTeacherSubjects();
}

 ?>