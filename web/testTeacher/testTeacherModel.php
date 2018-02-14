<?php
// Solicitamos el archivo de conexión a BBDD
require_once __DIR__ . "/Implementation/MysqlDBImplementation.php";

		//creamos clase
class testTeacherModel{

		//Constructor (crea la clase)
		public function __construct(){}

		//Destructor (Destruye la clase)
		public function __destruct(){}


		public function testPasoUnoModel($idUser){
							$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
							$query = "SELECT ID_ASIGN, NOMBRE_ASIGN, NIVEL_ASIGN FROM ASIGN WHERE ID_PROFE = '{$idUser}'";
							$result = $mysqli->executeQuery($query);
	
							return $result;
		}


	}










 ?>
