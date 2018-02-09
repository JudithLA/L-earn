<?php
//require para conectar a la vista y al modelo
require_once __DIR__ . "/teacherStudentsModel.php";
require_once __DIR__ . "/teacherStudentsView.php";

class TeacherStudentsController{
	//constructor y destructor para crear y destruir la clase
	public function __construct(){}
	public function __destruct(){}



//FALTA definir la supervariable de sesión

//método para obtener los alumnos del grupo
	public function getStudentsGroups(){
		
		//variable para recoger el GroupId a través del método GET para que abra los alumnos de ese grupo; posteriormente, se la pasaremos al método de modelo a través del parámetro
		$varIdGroup = $_GET['GroupId'];

		//variable para instanciar objeto de clase TeacherStudentsModel
		//almacenamos en una variable ($resultadoQuery) la llamada al método (getTeacherStudents($varIdGroup)) de clase TeacherStudentsModel y le pasamos la variable que almacena el GroupId por parámetro
		$model = new TeacherStudentsModel();
		$resultadoQuery = $model->getTeacherStudents($varIdGroup);
		// creamos una variable donde instanciamos objeto de clase TeacherStudentsView.
		//ejecutamos el método viewStudents pasándole como parámetro el resultado de la query ($resultadoQuery) que hemos obtenido en la ejecución del modelo. Esta llamada al métoda será la encargada de printarlo con parámetros.
		$vista = new TeacherStudentsView();
		return $vista->viewStudents($resultadoQuery);
		
	}

//volvemos a llamar al método para imprimir por pantalla esta vez sin parámetros; así y con la formulación "= null" en los parámetros de los métodos de vista , nos aseguramos de que siempre habrá algo pintado en pantalla aunque no le pasemos parámetros por querystring (por ejemplo: si te metes directamente a la pantalla de teacherStudents.php)
	public function showViewStudents(){
		//variable objeto de la clase teacherStudentsView
		$view = new TeacherStudentsView();
		//devolvemos f de clase teacherStudentsView
		return $view->viewStudents();
	}
}

?>
