<?php
	require_once __DIR__ . "/rewardsStudentModel.php";
	require_once __DIR__ . "/rewardsStudentView.php";

	class RewardsStudentController{

		public function __construct(){}

		public function __destruct(){}

		public function viewInfo(){

			// $this->getPercentageStudentExpPoints();
			// $this->getStudentFinPoints();
			// $this->getInfoStudent();

			$view = new RewardsStudentView();

			return $view->genRewardsHTML();
		}

		public function getRewards(){

			$model = new RewardsStudentModel();

			return $model->rewards();

		}

	}

?>
