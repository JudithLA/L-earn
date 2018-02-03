<?php
	// Incluimos el archivo del Controlador
	require_once __DIR__ . "/testStudentController.php";


	session_start();

	if (!empty($_POST)) {
		$action = $_POST['action'];
		$view = new TestStudentController();
		echo json_encode($view->$action());

	}else{

		// Instanciamos un objeto de la clase HomeStudentController
		$view = new TestStudentController();
		// Devolvemos y mostramos el HTML
		echo $view->viewInfo();
	}
 ?>
