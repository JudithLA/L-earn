<?php 


//solicitamos el archivo de Controlador
require_once __DIR__ . "/homeStudentController.php";

	//instancias/creas un objeto de clase LoginController
	$view = new homeStudentController();
	//llamas al método del objeto: devuelves el HTML generado en la vista
	echo $view->viewInfo();


 ?>