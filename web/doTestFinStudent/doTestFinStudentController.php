<?php
	require_once __DIR__ . "/doTestFinStudentModel.php";
	require_once __DIR__ . "/doTestFinStudentView.php";

	class DoTestFinStudentController{

		public function __construct(){}
		public function __destruct(){}

		public function viewInfo(){
			$view = new DoTestFinStudentView();
			return $view->genTestFin();
		}

		public function getTestFinalName(){
			$IdTestFin = $_GET["TestFinId"];

			$model = new DoTestFinStudentModel();
			return $model->finTestName($IdTestFin);
		}

		public function getFinalQuestions(){
			$IdTestFin = $_GET["TestFinId"];

			$model = new DoTestFinStudentModel();
			return $model->finQuestions($IdTestFin);
		}

		public function getFinalResponses(){
			$IdTestFin = $_GET["TestFinId"];

			$model = new DoTestFinStudentModel();
			return $model->finResponses($IdTestFin);
		}

		public function getResultTest(){
			$date = $_GET["date"];
			$points = $_GET["points"];
			$IdTestFin = $_GET["TestFinId"];

			$model = new DoTestFinStudentModel();
			return $model->insertResultTest($date, $points, $IdTestFin);
		}
	}

?>
