<?php
	// Incluimos el archivo del Controlador
	require_once __DIR__ . "/testStudentController.php";

	if (!isset($_SESSION)){session_start();}

	if (!empty($_POST)) {
		$action = $_POST['action'];
		$view = new TestStudentController();
		echo json_encode($view->$action());

	}else{
		if(isset($_GET['action'])){
 			$action = $_GET ['action'];
 			$view = new TestStudentController();
 			echo $view->$action();
 		}else {
 			$view = new TestStudentController();
 			echo $view->viewInfo();
 		}
	}
 ?>
