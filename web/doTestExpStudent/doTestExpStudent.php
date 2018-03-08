<?php
	require_once __DIR__ . "/doTestExpStudentController.php";

	if (!isset($_SESSION)){session_start();}

	if (!empty($_POST)) {
		$action = $_POST['action'];
		$view = new DoTestExpStudentController();
		echo json_encode($view->$action());

	}else{
		if(isset($_GET['action'])){
 			$action = $_GET ['action'];
 			$view = new DoTestExpStudentController();
 			echo json_encode($view->$action());
 		}else {
 			$view = new DoTestExpStudentController();
 			echo $view->viewInfo();
 		}
	}
 ?>
