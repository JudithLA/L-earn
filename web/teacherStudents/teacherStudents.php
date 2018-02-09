<?php 
//solicitamos el archivo de Controlador
require_once __DIR__ . "/teacherStudentsController.php";

if (!isset($_SESSION)){session_start();}

if(!empty($_POST)) {
	//almacenamos el método POST en la variable action. instanciamos un objeto teachStudentsController de la clase HomeStudentsController. nos referimos al método post  a través de la variable action; para ello, señalamos la variable con el objeto instancado de teachStudentsController
	$action = $_POST ['action'];
    $teachStudentsController = new TeacherStudentsController();
    $result = $teachStudentsController->$action();
    echo json_encode($result); 
	
}else{

	if(isset($_GET['action'])){
		$action = $_GET ['action'];
	    $teachStudentsController = new TeacherStudentsController();
	    $result = $teachStudentsController->$action();
	    echo $result; 
		
	}else {
		$view = new TeacherStudentsController();
		//llamas al método de mostrar de View para que se pinte algo
		echo $view->showViewStudents();	
	}
	
}

 ?>