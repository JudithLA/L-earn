<?php 
	// Incluimos el archivo del Controlador
	require_once __DIR__ . "/homeStudentController.php";

	// Instanciamos un objeto de la clase HomeStudentController
	$view = new HomeStudentController();
	// Devolvemos y mostramos el HTML
	echo $view->viewInfo();

 ?>