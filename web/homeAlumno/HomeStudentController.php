<?php  
require_once "loginModel.php";
require_once "loginView.php";

//Clase que gestiona las llamadas con la pantalla de login
class HomeStudentController{
	
	//Constructor (crea la clase)
	public function __construct(){}

	//Destructor (Destruye la clase)
	public function __destruct(){}		

	// Método para mostrar el HTML
	public function viewInfo(){
		// Instanciamos un objeto de la clase HomeStudentView
		$view = new HomeStudentView();
		// Devolvemos el HTML generado en la vista
		return $view->genHomeStudent();
	}

	// Método para obtener el último test final realizado por el alumno 
	public function nextTest(){

		// Instanciamos un objeto de la clase HomeStudentModel
		$model = new HomeStudentModel();

		// Devolvemos la info extraída de la BBDD
		return $model->nextTest();

	}
	
	// Método para obtener el porcentaje de los puntos de experiencia total del alumno entre todas sus asignaturas 
	public function percentageStudentExpPoints(){

		// Instanciamos un objeto de la clase HomeStudentModel
		$model = new HomeStudentModel();

		// Devolvemos la info extraída de la BBDD
		return $model->percentageStudentExpPoints();

	}

	// Método para obtener los puntos finales totales del alumno 
	public function studentFinPoints(){

		// Instanciamos un objeto de la clase HomeStudentModel
		$model = new HomeStudentModel();

		// Devolvemos la info extraída de la BBDD
		return $model->studentFinPoints();

	}

}

?>