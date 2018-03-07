<?php
require_once __DIR__ . "/teacherTestsModel.php";
require_once __DIR__ . "/teacherTestsView.php";

class TeacherTestsController{
	public function __construct(){}

	public function __destruct(){}		

	public function getTeacherTests(){
		$model = new TeacherTestsModel();
		return $model->teacherTestsQuery();
	}

	public function showViewTeacherTests(){
		$view = new TeacherTestsView();
		return $view->viewTeacherTests();
	}
}


?>