<?php
	require_once __DIR__ . "/testStudentModel.php";
	require_once __DIR__ . "/testStudentView.php";

	class TestStudentController{

		public function __construct(){}
		public function __destruct(){}

		public function viewInfo(){
			$view = new TestStudentView();
			return $view->genTestUnit();
		}

		public function getTitles(){
			$IdUnit = $_GET['UnitId'];

			$model = new TestStudentModel();
			return $model->titles($IdUnit);
		}

		public function getTestEntre(){
			$IdUnit = $_GET['UnitId'];

			$model = new TestStudentModel();
			return $model->testUnitEntre($IdUnit);
		}

		public function getTestFinal(){
			$IdUnit = $_GET['UnitId'];

			$model = new TestStudentModel();
			return $model->testUnitFinal($IdUnit);
		}
	}

?>
