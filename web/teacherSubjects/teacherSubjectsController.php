<?php
require_once __DIR__ . "/teacherSubjectsModel.php";
require_once __DIR__ . "/teacherSubjectsView.php";

class TeacherSubjectsController{
	public function __construct(){}

	public function __destruct(){}		

	//método para obtener todas las asignaturas que imparte el profesor logeado
	public function getTeacherSubjects(){
		$model = new TeacherSubjectsModel();
		return $model->teacherSubjectsQuery();
	}

	//método para imprimir el view
	public function showViewTeacherSubjects(){
		$view = new TeacherSubjectsView();
		return $view->viewTeacherSubjects();
	}
}


?>