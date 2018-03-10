<?php
	require_once __DIR__ . "/doTestExpStudentModel.php";
	require_once __DIR__ . "/doTestExpStudentView.php";

	class DoTestExpStudentController{

		public function __construct(){}
		public function __destruct(){}

		public function viewInfo(){
			$view = new DoTestExpStudentView();
			return $view->genTestExp();
		}

		public function getTestEntreName(){
			$IdTestExp = $_GET["TestExpId"];

			$model = new DoTestExpStudentModel();
			return $model->expTestName($IdTestExp);
		}

		public function getEntreQuestions(){
			$IdTestExp = $_GET["TestExpId"];

			$model = new DoTestExpStudentModel();
			return $model->entreQuestions($IdTestExp);
		}

		public function getEntreResponses(){
			$IdTestExp = $_GET["TestExpId"];

			$model = new DoTestExpStudentModel();
			return $model->entreResponses($IdTestExp);
		}

		public function getResultTest(){
			$date = $_GET["date"];
			$IdTestExp = $_GET["TestExpId"];
			$expPoints = $_GET["points"];

			$model = new DoTestExpStudentModel();
			return $model->insertResultTestExp($date, $IdTestExp, $expPoints);
		}

		public function getUpdatedFinalPoints(){
			$expPoints = $_GET["points"];

			$model = new DoTestExpStudentModel();
			return $model->updateFinalPoints($expPoints);
		}

	}

?>
