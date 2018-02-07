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
				//session_start();
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

  // Insert centro y Genera Curso
	public function insertCenter(){
		$idCenter = $_POST['idCenter'];
		$_SESSION['idCenter'] = $idCenter;
		$model = new RegisterTeacherModel();
		$centers = $model->updateCenter($idCenter);
		$view = new RegisterTeacherView();
		$select = $view-> genCurso($centers);
		$cent['status'] = 'OK';
		$cent['html'] = $select;
		return $cent;
	}

  // Insert Curso y Genera Letra
	public function insertCurso(){
		$curso = $_POST['curso'];
		$_SESSION['nivel_curso'] = $curso;
		$model = new RegisterTeacherModel();
		$letra = $model->selectLetraModel($curso);
		$view = new RegisterTeacherView();
		$select = $view-> genLetra($letra);
		$model = new RegisterTeacherModel();
		$id_curso = $model->selectIdCursoModel($curso);
		$_SESSION['id_curso'] = $id_curso[0]['id_curso'];
		$cent['status'] = 'OK';
		$cent['html'] = $select;
		return $cent;
	}

	// Insert Letra y Genera Asignatura
	public function selectAsign(){
		$letra = $_POST['letra'];
		$_SESSION['letra_curso'] = $letra;
		$curso = $_SESSION['nivel_curso'];
		$model = new RegisterTeacherModel();
		$new = $model->selectAsignModel($curso);
		$view = new RegisterTeacherView();
		$select = $view-> genAsign($new);
		$cent['status'] = 'OK';
		$cent['html'] = $select;
		return $cent;
	}

	// Insert ASIGN
	public function insertAsign(){
		$asign = $_POST['asign'];
		$model = new RegisterTeacherModel();
		$new = $model->insertAsignModel($asign);
		$_SESSION['id_asign'] = $new[0]['id_asign'];
		$model = new RegisterTeacherModel();
		$data_asign = $model->selectAsign();
		$model = new RegisterTeacherModel();
		$data_curso = $model->selectCurso();
		$model = new RegisterTeacherModel();
		$data_profe = $model->selectProfe();
		$view = new RegisterTeacherView();
		$select = $view-> modalFinal($data_asign, $data_curso, $data_profe);
		$cent['status'] = 'OK';
		$cent['html'] = $select;
		return $cent;
	}



}
?>
