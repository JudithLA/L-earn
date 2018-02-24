<?php
	require_once __DIR__ . "/asignStudentModel.php";
	require_once __DIR__ . "/asignStudentView.php";

	class AsignStudentController{

		public function __construct(){}

		public function __destruct(){}

		// Método para mostrar el HTML
		public function viewInfo(){
			$view = new AsignStudentView();
			return $view->genAsignStudent();
		}

		// Método para obtener las asignaturas del alumno
		public function getAsignStudent(){
			$model = new AsignStudentModel();
			return $model->asignStudent();
		}


	}

?>
