<?php
// Solicitamos el archivo de conexión a BBDD
require_once "Implementation/MysqlDBImplementation.php";

	//creamos clase
	class RegisterTeacherModel{

	//Constructor (crea la clase)
	public function __construct(){}

	//Destructor (Destruye la clase)
	public function __destruct(){}

		//Método para conectar a base de datos y ejecutar una query
		public function createTeacher($pickName,$pickEmail,$pickPass){
		//CONEXIÓN BBDD:
			//después del require_once "MysqlDBImplementation.php";, instanciamos un objeto de la clase

			//DBhost, $port, $DBname, $user, $pass
			$mysqli = new MysqlDBImplementation("localhost", "8889", "DBLEARN", "root", "learn");

			//llamamos al método constructor para abrir conexión con bbdd y lo rellenamos con los datos de los parámetros

			//abrimos conexión con MySQLi
			//comprobamos si el usuario que se esta registrando ya esta registrado o no
			$query = "SELECT COUNT(*) as PROFE_CREATED FROM PROFE WHERE EMAIL_PROFE = '{$pickEmail}' limit 1";

			$result = $mysqli->executeQuery($query);

			// Inicializamos
			$id = 0;

			// Comprobamos si esta registrando
			// El cero es la posicion del vector y profe_created es el nombre del campo
			if($result [0]['PROFE_CREATED'] == 0){

			//Definimos la query
			$consult = "INSERT INTO PROFE VALUES (NOMBRE_PROFE = '{$pickName}', EMAIL_PROFE = '{$pickEmail}' AND CONTRASENA_PROFE = '{$pickPass}')";
			$checkQuery = "SELECT ID_PROFE FROM PROFE WHERE EMAIL_PROFE = '{$pickEmail}'";
			//Ejecución de query en la base de datos mediante el objeto mysqli.
			//almacenamos en $result los resultados de la query "$consult" ejecutando el método query()
			$result = $mysqli->executeQuery($consult);

			//inicialiamos id =0, porque si no hay resultados no nos devolvería 0 al controlador sino "vacío" y daría fallo


			//recorremos toda las filas de la tabla con el metodo mysqli_fecth_assoc()
			//le pasamos al método nuestra query ($result)
			/*while($row = mysqli_fetch_assoc($result)){

				//almacenamos en $id el resultado de la query &consult (valor del campo ID_PRO)
				//será cero si no encuantra ningúna fila con NOM_PRO=name y CON_PRO=password
				$id = $row["ID_PRO"];

			}*/
			$id = $result[0]['ID_PROFE'];
		}
			//cerramos conexión
			$mysqli->disconnect();
			return $id;
		}


	}



 ?>
