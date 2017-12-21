<?php 
	// Incluimos el archivo del Controlador
	require_once __DIR__ . "/homeStudentController.php";

	if (!empty($_POST)) {
		$action = $_POST['action'];
		$view = new HomeStudentController();
		echo json_encode($view->$action());	
	
	}else{

		// Instanciamos un objeto de la clase HomeStudentController
		$view = new HomeStudentController();
		// Devolvemos y mostramos el HTML
		echo $view->viewInfo();
	}
 ?>