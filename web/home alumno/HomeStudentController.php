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

	// Método para extraer información actual del alumno 
	public function showInfoStudent(){

		// Instanciamos un objeto de la clase HomeStudentModel
		$model = new HomeStudentModel();

		// Devolvemos la información actual del alumno extraída de la base de datos
		return $model->showCurrentInfo();

	}
}

?>