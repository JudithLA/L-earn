<?php
	require_once __DIR__ . "/unitStudentModel.php";
	require_once __DIR__ . "/unitStudentView.php";

	class UnitStudentController{

		public function __construct(){}

		public function __destruct(){}

		// Método para mostrar el HTML
		public function viewInfo(){
			$view = new UnitStudentView();
			return $view->genUnitsStudent($resultQueryUnits, $resultQueryQuarter);
		}

		public function getUnitsStudent(){
			$IdAsign = $_GET['AsignId'];

			$model = new UnitStudentModel();
			$resultQueryUnits = $model->unitsStudent($IdAsign);
			$resultQueryQuarter = $model->passedQuarter($IdAsign);

			$view = new UnitStudentView();
			return $view->genUnitsStudent($resultQueryUnits, $resultQueryQuarter);
		}

	}

?>
