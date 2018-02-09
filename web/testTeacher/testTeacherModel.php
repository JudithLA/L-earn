<?php
// Solicitamos el archivo de conexión a BBDD
require_once __DIR__ . "/Implementation/MysqlDBImplementation.php";

		//creamos clase
class testTeacherModel{

		//Constructor (crea la clase)
		public function __construct(){}

		//Destructor (Destruye la clase)
		public function __destruct(){}


		public function createTestModel($pickName,$pickEmail,$pickPass){
							$mysqli = new MysqlDBImplementation(/*"localhost", "8889", "DBLEARN", "root", "learn"*/);
							$query = "SELECT COUNT(*) as PROFE_CREATED FROM PROFE WHERE EMAIL_PROFE = '{$pickEmail}' limit 1";
							$result = $mysqli->executeQuery($query);
							// Inicializamos
							$id = 0;


							if($result [0]['PROFE_CREATED'] == 0){
											$consult = "INSERT INTO PROFE (NOMBRE_PROFE, EMAIL_PROFE, CONTRASENA_PROFE) VALUES ('{$pickName}', '{$pickEmail}', '{$pickPass}')";
											$checkQuery = "SELECT ID_PROFE FROM PROFE WHERE EMAIL_PROFE = '{$pickEmail}'";

							        // modifyQuery es para UPDATE, INSERT y DELETE
											$mysqli->modifyQuery($consult);

							        // executeQuery es para SELECT
							        $result = $mysqli->executeQuery($checkQuery);
											$id = $result[0]['ID_PROFE'];
							}
							return $id;
		}


	}










 ?>
