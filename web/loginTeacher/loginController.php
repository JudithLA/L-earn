<?php
require_once __DIR__ . "/loginModel.php";
require_once __DIR__ . "/loginView.php";

//clase que gestiona las llamadas con la pantalla de login
class loginController {

	//Constructor (crea la clase)
	/*function __construct(){

	}

	//Destructor (Destruye la clase)
	function __destruct(){

	}*/

	// 2º) función para mostrar el HTML
	public function mainLogin(){
		//instancias/creas un objeto de clase LoginView
		$view = new loginView();
		//devuelves el HTML generado en la vista
		return $view->genLogin();
	}

	// 1º) función para recoger el login
	public function checkLogin(){
    //variable para recoger el envío de datos del usuario
		$pickEmail = $_POST ["email"];
		//variable para recoger el envío de datos del usuario
		$pickPass = $_POST ["password"];


		$model = new loginModel();

		//variable para almacenar si email y password existen y coinciden
		//llamamos al método checkPAss() de la clase LoginModel. lo hacemos señalándolo con el objeto de su clase ($model)
		//esto devuelve un número de 0 en adelante. Si no es cero, login OK
		$idUser = $model->loginUser($pickEmail,$pickPass);
        
		//Si login es correcto...
		if($idUser){

			//Creamos sesión para almacenar idUser en una variable de sesión para usarlo en distintas partes de la app
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

			//creamos segundo campo de array asociativo -> message = "la has cagado amigo";
			$failLogin["message"] = "Error, no existe usuario/contraseña";
			return $failLogin;
		}
	}
}
?>
