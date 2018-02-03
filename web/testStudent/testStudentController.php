<?php
	require_once __DIR__ . "/testStudentModel.php";
	require_once __DIR__ . "/testStudentView.php";

	class TestStudentController{

		public function __construct(){

		}

		public function __destruct(){}

		// Método para mostrar el HTML
		public function viewInfo(){
			$view = new TestStudentView();
			return $view->genTestStudent();
		}

		// Método para obtener las asignaturas del alumno
		public function getAsignStudent(){
			$model = new TestStudentModel();
			return $model->asignStudent();
		}


	}

?>
