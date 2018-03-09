<?php
//require para conectar a la vista y al modelo
require_once __DIR__ . "/teacherSubjectsUnitsModel.php";
require_once __DIR__ . "/teacherSubjectsUnitsView.php";

class TeacherSubjectsUnitsController{
	public function __construct(){}
	public function __destruct(){}

	public function getSubjectsUnits(){
		//$varIdSubject SubjectId a través del método GET (se lo pasamos por queryString en teacherSubjectsFunctions.js)
		$varSubjectId = $_GET['SubjectId'];
		$varSubjectLevel = $_GET['SubjectLevel'];

		//almacenamos en $resultadoQuery la llamada al método (getSubjectsUnitsQuery($varSubjectId)) de clase TeacherSubjectsUnitsModel y le pasamos la variable que almacena el SubjectId por parámetro
		$model = new TeacherSubjectsUnitsModel();
		$resultadoQueryBreadcrumb = $model-> getSubjectsUnitsBreadcrumb($varSubjectId, $varSubjectLevel);
		//var_dump($resultadoQueryBreadcrumb);
		$resultadoQuery = $model->getSubjectsUnitsQuery($varSubjectId, $varSubjectLevel);
		$resultadoQuery2 = $model->getSubjectsGroupsQuery($varSubjectId, $varSubjectLevel);

		//ejecutamos el método viewUnits pasándole como parámetro el resultado de la query ($resultadoQuery) que hemos obtenido en la ejecución del modelo. Esta llamada al métoda será la encargada de printarlo con parámetros y en función del groupId que hemos obtenido en este mismo método.
		$vista = new TeacherSubjectsUnitsView();
		return $vista->viewUnits($resultadoQueryBreadcrumb, $resultadoQuery, $resultadoQuery2);		

	}

//volvemos a llamar al método para imprimir por pantalla esta vez sin parámetros; así y con la formulación "= null" en los parámetros de los métodos de vista , nos aseguramos de que siempre habrá algo pintado en pantalla aunque no le pasemos parámetros por querystring (por ejemplo: si te metes directamente a la pantalla de teacherStudents.php). = null asegura que si no le pasamos parámetro, le asigna el valor nulo
	public function showViewUnits(){
		$view = new TeacherSubjectsUnitsView();
		return $view->viewUnits();
	}

//estos son los métodos para mostrar todos los grupos disponibles cuando haces click en modificar
	public function getAllGroupsSubjects(){
		$varSubjectId = $_GET['SubjectId'];
		$varSubjectLevel = $_GET['SubjectLevel'];

		//tienes dos métodos que van por el mismo camino: uno que devuelve html (getSubjectsUnits) y otro que tiene que devolver un conjunto de datosen formato JSON (getAllGroupsSubjects). 
		$model = new TeacherSubjectsUnitsModel();
		return json_encode($model->getSubjectsAllGroupsQuery($varSubjectId, $varSubjectLevel));
	}

	public function modifyGroupsSubjects(){
		//esta fórmula de las siguientes variables se llama Operador Terciario. es una fórmula igual que una estructura de if else. Lo que hacemos es asegurarnos que, aunque reciba un array vacío, devolveremos un contenido vacío
		$checkGroups = (isset($_POST['checkGroups']))? $_POST['checkGroups'] : [] ;
		$noCheckGroups = (isset($_POST['noCheckGroups']))? $_POST['noCheckGroups'] : [] ;  
		$SubjectId = $_POST['SubjectId'];  
		$SubjectLevel = $_POST['SubjectLevel'];  

		//trazas de pruebas:
		// var_dump($checkGroups);
		// var_dump($noCheckGroups);
		// var_dump($SubjectId);
		// var_dump($SubjectLevel);


		$model = new TeacherSubjectsUnitsModel();
		return $model->modifyGroupsSubjectsQuery($checkGroups,$noCheckGroups,$SubjectId,$SubjectLevel);

	}
}

?>
