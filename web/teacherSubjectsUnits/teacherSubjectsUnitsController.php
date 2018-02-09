<?php
//require para conectar a la vista y al modelo
require_once __DIR__ . "/teacherSubjectsUnitsModel.php";
require_once __DIR__ . "/teacherSubjectsUnitsView.php";

class TeacherSubjectsUnitsController{
	public function __construct(){}
	public function __destruct(){}

	public function getUnitsSubjects(){
		//$varIdSubject recoge el SubjectId a través del método GET para que abra los temas de esa asignatura (recordamos que lo enviamos por querystring en la pantalla anterior teacherSubjects); posteriormente, se la pasaremos al método de modelo a través del parámetro
		$varIdSubject = $_GET['SubjectId'];

		//variable para instanciar objeto de clase TeacherSubjectsUnitsModel
		//almacenamos en $resultadoQuery la llamada al método (getSubjectsUnitsQuery($varSubjectId)) de clase TeacherSubjectsUnitsModel y le pasamos la variable que almacena el SubjectId por parámetro
		$model = new TeacherSubjectsUnitsModel();
		$resultadoQuery = $model->getSubjectsUnitsQuery($varSubjectId);
		// creamos una variable ($vista) donde instanciamos objeto de clase TeacherSubjectsUnitsView.
		//ejecutamos el método viewStudents pasándole como parámetro el resultado de la query ($resultadoQuery) que hemos obtenido en la ejecución del modelo
		$vista = new TeacherSubjectsUnitsView();
		return $vista->viewStudents($resultadoQuery);		

	}

//método para imprimir el view; este se encarga de imprimirlo por pantalla, no tiene nada que ver que hayas llamado a otro método de su clase (studentsList) anteriormente
	public function showViewStudents(){
		//variable objeto de la clase TeacherSubjectsUnitsView
		$view = new TeacherSubjectsUnitsView();
		//devolvemos f de clase TeacherSubjectsUnitsView
		return $view->viewStudents();
	}
}

?>
