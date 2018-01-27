<?php
require_once __DIR__ . "/RegisterTeacherModel.php";
require_once __DIR__ . "/RegisterTeacherView.php";


class RegisterTeacherController {

	//Constructor (crea la clase)
	/*function __construct(){

	}

	//Destructor (Destruye la clase)
	function __destruct(){

	}*/

	// 2º) función para mostrar el HTML
	public function mainRegister(){
			//instancias/creas un objeto de clase LoginView
			$view = new RegisterTeacherView();
			//devuelves el HTML generado en la vista
			return $view->genRegister();
	}

	// 1º) función para recoger el register
	public function checkRegister(){

		$pickName = $_POST ["name"];
		$pickEmail = $_POST ["email"];
		$pickPass = $_POST ["password"];



		$model = new RegisterTeacherModel();


		$idUser = $model->createTeacher($pickName,$pickEmail,$pickPass);


		if($idUser){
				session_start();
				$_SESSION ["id"] = $idUser;
	      $result['status'] = 'OK';
				$result['url'] = "http://www.publico.es";
	      $result['idUser'] = $idUser;
	      return $result;
		}
		else{
				$failLogin ["status"] = 0;

				$failLogin["message"] = "la has cagado amigo";
				return $failLogin;
		}
	}



public function getCenter(){
			$model = new RegisterTeacherModel();

			$centers = $model->selectCenter();

			$view = new RegisterTeacherView();
			$select = $view->genSelect($centers);
			$cent['status'] = 'OK';
			$cent['html'] = $select;
			return $cent;


	}

	public function insertCenter(){
		$idCenter = $_POST['idCentro'];
		$model = new RegisterTeacherModel();
		$centers = $model->updateCenter($idCenter);
		$view = new RegisterTeacherView();
		$select = $view-> genCurso($centers);
		return $select;
	}
}
?>
