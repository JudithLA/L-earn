<?php
require_once __DIR__ . "/loginModel.php";
require_once __DIR__ . "/loginView.php";



class loginController {

	//Constructor (crea la clase)
	function __construct(){

	}

	//Destructor (Destruye la clase)
	function __destruct(){

	}

	
	public function mainLogin(){

		$view = new loginView();
		//devuelves el HTML generado en la vista
		return $view->genLogin();
	}

	// 1º) función para recoger el login
	public function checkLogin(){

		$pickEmail = $_POST ["email"];
		$pickPass = $_POST ["password"];


		$model = new loginModel();

		$idUser = $model->loginUser($pickEmail,$pickPass);
        

		
		if($idUser>=1){

			
			session_start();

			//almacenamos $idUser en la supervariable de sesión
			$_SESSION ["id"] = $idUser;
            $result['status'] = 'OK';
			$result['url'] = "http://www.publico.es";
            $result['idUser'] = $idUser;
            return $result;
		}
		else{

			//creamos primer campo de array asociativo -> status = 0;
			$failLogin ["status"] = 0;

			
			$failLogin["msgError"] = "<a href='../registerTeacher/RegisterTeacher.html'>¿Eres nuevo?</a>";
			$failLogin["emailError"] = "Comprueba que has introducido un email correcto";
			$failLogin["passError"] = "Comprueba tu contraseña";
			return $failLogin;
		}
	}
}
?>
