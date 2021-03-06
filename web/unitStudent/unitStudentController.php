<?php
	require_once __DIR__ . "/unitStudentModel.php";
	require_once __DIR__ . "/unitStudentView.php";



	class UnitStudentController{

		public function __construct(){}
		public function __destruct(){}

		public function viewInfo(){
			$view = new UnitStudentView();
			return $view->genUnitsStudent();
		}

		public function getTitle(){
			$IdAsign = $_GET['AsignId'];

			$model = new UnitStudentModel();
			return $model->titleAsign($IdAsign);
		}

		public function getUnits(){
			$IdAsign = $_GET['AsignId'];

			$model = new UnitStudentModel();
			return $model->unitsStudent($IdAsign);
		}

		public function getPassedUnit(){
			$IdAsign = $_GET['AsignId'];

			$model = new UnitStudentModel();
			return $model->passedUnit($IdAsign);
		}

		public function getPassedQuarter(){
			$IdAsign = $_GET['AsignId'];

			$model = new UnitStudentModel();
			return $model->passedQuarter($IdAsign);
		}

	}

?>
