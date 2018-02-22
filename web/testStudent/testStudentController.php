<?php
	require_once __DIR__ . "/testStudentModel.php";
	require_once __DIR__ . "/testStudentView.php";

	class TestStudentController{

		public function __construct(){}
		public function __destruct(){}

		public function viewInfo(){
			$view = new TestStudentView();
			return $view->genTestUnit($resultQueryEntre, $resultQueryFinal);
		}

		public function getTestUnit(){
			$IdUnit = $_GET['UnitId'];

			$model = new TestStudentModel();
			$resultQueryEntre = $model->testUnitEntre($IdUnit);
			$resultQueryFinal = $model->testUnitFinal($IdUnit);

			$view = new TestStudentView();
			return $view->genTestUnit($resultQueryEntre, $resultQueryFinal);
		}

	}

?>
