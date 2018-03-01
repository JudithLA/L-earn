<?php
	require_once __DIR__ . "/asignStudentController.php";

	session_start();

	if (!empty($_POST)) {
		$action = $_POST['action'];
		$view = new AsignStudentController();
		echo json_encode($view->$action());

	}else{

		// Instanciamos un objeto de la clase HomeStudentController
		$view = new AsignStudentController();
		// Devolvemos y mostramos el HTML
		echo $view->viewInfo();
	}
 ?>
