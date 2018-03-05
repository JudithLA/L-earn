<?php 
//solicitamos el archivo de Controlador
require_once __DIR__ . "/teacherSubjectsUnitsController.php";

if (!isset($_SESSION)){session_start();}

if(!empty($_POST)) {
	$action = $_POST ['action'];
    $teachSubjectsUnitsController = new TeacherSubjectsUnitsController();
    $result = $teachSubjectsUnitsController->$action();
    echo json_encode($result); 
	
}else{

	if(isset($_GET['action'])){
		$action = $_GET ['action'];
	    $teachSubjectsUnitsController = new TeacherSubjectsUnitsController();
	    $result = $teachSubjectsUnitsController->$action();
	    echo $result; 
		
	}else {
		$view = new TeacherSubjectsUnitsController();
		echo $view->showViewUnits();	
	}
	
}

 ?>