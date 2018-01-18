<?php 
//solicitamos el archivo de Controlador
require_once __DIR__ . "/homeTeacherController.php";

if(!empty($_POST)) {
	//almacenamos el método POST en la variable action. instanciamos un objeto teacherController de la clase HomeTeacherController. nos referimos al método post que a través de la variable action; para ello, señalamos la variable con el objeto instancado de teacherController
	$action = $_POST ['action'];
    $teacherController = new HomeTeacherController();
    $result = $teacherController->$action();
    echo json_encode($result); 
	return;
}else{
	//inicializar sesión aquí session_start(); y se define en elc controlador
	//instancias/creas un objeto de clase homeTeacherController
	$view = new HomeTeacherController();
	//llamas al método de mostrar del objeto de
	echo $view->showViewTeacher();
}

 ?>