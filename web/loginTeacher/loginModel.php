<?php
// Solicitamos el archivo de conexión a BBDD
require_once __DIR__ . "/Implementation/MysqlDBImplementation.php";

	//creamos clase
	class loginModel{

	//Constructor (crea la clase)
	public function __construct(){}

	//Destructor (Destruye la clase)
	public function __destruct(){}

		//Método para conectar a base de datos y ejecutar una query
		public function loginUser($pickEmail, $pickPass){
		

			//DBhost, $port, $DBname, $user, $pass
			$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
            
            $query = "SELECT ID_PROFE FROM PROFE WHERE EMAIL_PROFE = '{$pickEmail}' AND CONTRASENA_PROFE = '{$pickPass}'";
            

			$result = $mysqli->executeQuery($query);
			// Inicializamos
			$id = 0;
            if(!empty($result)){
                $id = $result[0]['ID_PROFE'];
            }
            else{
				// Si la uqery anterior no da resultados
				$id = 0;
                
            }
			return $id;
		}


	}



 ?>
