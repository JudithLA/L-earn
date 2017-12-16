<?php
//creamos clase de view
	class RegisterTeacherView{


	//Constructor (crea la clase)
	public function __construct(){}

	//Destructor (Destruye la clase)
	public function __destruct(){}

	//creación de método que te devuelve el HTML
	public function genLogin() {
		//variable con el HTML –¡! con comillas simples–y habría que devolver esa variable
		$resultHTML = "
    <!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <script src='js/jquery-3.2.1.min.js'></script>
    <script src='js/login.js'></script>
    <title>Bienvenido a L-Earn</title>
  </head>
  <body>

    <div>
      <form>
        <input type='text' id='email' name='email' placeholder='email'>
        <input type='text' id='password' name='password' placeholder='password'>

        <button id='btn_login' type='button'>Iniciar Sesión</button>
      </form>
        <div class='msgError'></div>
    </div>

  </body>
</html>

		";
		return $resultHTML;
	}

	}

?>
