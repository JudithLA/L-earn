<?php
	require_once __DIR__ . "/unitStudentController.php";

	if (!isset($_SESSION)){session_start();}

	if(!empty($_POST)) {
		$action = $_POST ['action'];
		$view = new UnitStudentController();
		echo json_encode($view->$action());
	}else{
		if(isset($_GET['action'])){
			$action = $_GET ['action'];
			$view = new UnitStudentController();
			echo json_encode($view->$action());
		}else {
			$view = new UnitStudentController();
			echo $view->viewInfo();
		}
	}
?>
