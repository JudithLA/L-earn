<?php
	require_once __DIR__ . "/rewardsStudentModel.php";
	require_once __DIR__ . "/rewardsStudentView.php";

	class RewardsStudentController{

		public function __construct(){}

		public function __destruct(){}

		public function viewInfo(){

			$view = new RewardsStudentView();

			return $view->genRewardsHTML();
		}

		public function getRewards(){

			$model = new RewardsStudentModel();

			return $model->rewards();

		}

		public function updatePoints(){
				$costReward = $_POST['costReward'];
				$rewardId = $_POST['rewardId'];

				$model = new RewardsStudentModel();

				return $model->updateFinPoints($costReward, $rewardId);
		}

	}

?>
