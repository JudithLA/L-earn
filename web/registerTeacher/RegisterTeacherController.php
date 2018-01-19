<?php
require_once __DIR__ . "/RegisterTeacherModel.php";
require_once __DIR__ . "/RegisterTeacherView.php";

//clase que gestiona las llamadas con la pantalla de login
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

		//variable para recoger el envío de datos del usuario
		$pickName = $_POST ["name"];
    //variable para recoger el envío de datos del usuario
		$pickEmail = $_POST ["email"];
		//variable para recoger el envío de datos del usuario
		$pickPass = $_POST ["password"];


		//para utilizar un método,
			//1º debemos instanciar un objeto de su clase (clase=estructura / objeto=instanciar) [$model = new LoginModel();].
			//2º) Debemos llamar a ese método señalándolo con el objeto que hemos instanciado y dándole los parámetros que hemos definido previamente ($model->checkPass($pickName,$pickPass);)
		//instanciamos objeto de la clase LoginModel

		$model = new RegisterTeacherModel();

		//variable para almacenar si email y password existen y coinciden
		//llamamos al método checkPAss() de la clase LoginModel. lo hacemos señalándolo con el objeto de su clase ($model)
		//esto devuelve un número de 0 en adelante. Si no es cero, login OK
		$idUser = $model->createTeacher($pickName,$pickEmail,$pickPass);

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
}
?>
