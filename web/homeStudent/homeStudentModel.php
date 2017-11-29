<?php 
	// Incluimos el archivo con la conexión a base de datos
	require_once __DIR__ . "../ConnectSupport/Implementation/MysqlDBImplementation.php";

	//creamos clase 
	class HomeStudentModel{

		//Constructor (crea la clase)
		public function __construct(){}

		//Destructor (Destruye la clase)
		public function __destruct(){}		

		// Método consultar la BBDD y obtener el último test final realizado por el alumno
		public function nextTest(){

			// Creamos un objeto de la clase MysqlDBImplementation y abrimos conexión con base de datos
			// Parámetros: host, puerto, nombre de base de datos, usuario, contraseña
			$mysqli = new MysqlDBImplementation("localhost", "8889", "DBLEARN", "root", "learn");

			// Definimos la query
			$consult = "SELECT 

			 WHERE ID_ALUMN = '{$_SESSION ["id"]}'";

			//Ejecución de query en la base de datos mediante el objeto mysqli.
			//almacenamos en $result los resultados de la query "$consult" ejecutando el método query()  
			$result = $mysqli -> query($consult);

			//inicialiamos id =0, porque si no hay resultados no nos devolvería 0 al controlador sino "vacío" y daría fallo
			// $id = 0;
			
			//recorremos toda las filas de la tabla con el metodo mysqli_fecth_assoc()
			//le pasamos al método nuestra query ($result)
			while($row = mysqli_fetch_assoc($result)){
				
				//almacenamos en $id el resultado de la query &consult (valor del campo ID_PRO)
				//será cero si no encuantra ningúna fila con NOM_PRO=name y CON_PRO=password
				// $id = $row["ID_PRO"];

			}

			// return $id;
		}

		// Método consultar la BBDD y obtener el porcentaje de los puntos de experiencia total del alumno entre todas sus asignaturas
		public function percentageStudentExpPoints(){

			// Creamos un objeto de la clase MysqlDBImplementation y abrimos conexión con base de datos
			// Parámetros: host, puerto, nombre de base de datos, usuario, contraseña
			$mysqli = new MysqlDBImplementation("localhost", "8889", "DBLEARN", "root", "learn");

			// Definimos la query
			$consult = "SELECT (ALUMN.EXPERIENCIA_ALUMN*100)/(SELECT COUNT(ENTRE.ID_ENTRE)*4 AS TotalExperiencia FROM ENTRE
        				INNER JOIN TEMAS ON ENTRE.ID_TEMAS = TEMAS.ID_TEMAS
        				INNER JOIN ASIGN ON TEMAS.ID_ASIGN = ASIGN.ID_ASIGN)
						FROM ALUMN WHERE ALUMN.ID_ALUMN = '{$_SESSION ["id"]}'";

			//Ejecución de query en la base de datos mediante el objeto mysqli.
			//almacenamos en $result los resultados de la query "$consult" ejecutando el método query()  
			$result = $mysqli -> query($consult);
			
			//recorremos toda las filas de la tabla con el metodo mysqli_fecth_assoc()
			//le pasamos al método nuestra query ($result)
			while($row = mysqli_fetch_assoc($result)){
				
				//almacenamos en $id el resultado de la query &consult (valor del campo ID_PRO)
				//será cero si no encuantra ningúna fila con NOM_PRO=name y CON_PRO=password
				// $id = $row["ID_PRO"];

			}

			// return $id;
		}

		// Método consultar la BBDD y obtener los puntos finales totales del alumno
		public function studentFinPoints(){

			// Creamos un objeto de la clase MysqlDBImplementation y abrimos conexión con base de datos
			// Parámetros: host, puerto, nombre de base de datos, usuario, contraseña
			$mysqli = new MysqlDBImplementation("localhost", "8889", "DBLEARN", "root", "learn");

			// Definimos la query
			$consult = "SELECT PUNTOS_ALUMN FROM ALUMN WHERE ID_ALUMN = '{$_SESSION ["id"]}'";

			//Ejecución de query en la base de datos mediante el objeto mysqli.
			//almacenamos en $result los resultados de la query "$consult" ejecutando el método query()  
			$result = $mysqli -> query($consult);
			
			//recorremos toda las filas de la tabla con el metodo mysqli_fecth_assoc()
			//le pasamos al método nuestra query ($result)
			while($row = mysqli_fetch_assoc($result)){
				
				//almacenamos en $id el resultado de la query &consult (valor del campo ID_PRO)
				//será cero si no encuantra ningúna fila con NOM_PRO=name y CON_PRO=password
				// $id = $row["ID_PRO"];

			}

			// return $id;
		}

	}
	


 ?>