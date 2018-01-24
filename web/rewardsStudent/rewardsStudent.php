<?php 

	require_once __DIR__ . "/rewardsStudentController.php";


	if (!empty($_POST)) {
		$action = $_POST['action'];
		$view = new RewardsStudentController();
		echo json_encode($view->$action());	
	
	}else{

		$view = new RewardsStudentController();

		echo $view->viewInfo();
	}

 ?>