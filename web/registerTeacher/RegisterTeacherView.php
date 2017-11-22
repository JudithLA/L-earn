<?php
//creamos clase de view
	class RegisterTeacherView{


	//Constructor (crea la clase)
	public function __construct(){}

	//Destructor (Destruye la clase)
	public function __destruct(){}

	//creación de método que te devuelve el HTML
	public function genRegister() {
		//variable con el HTML –¡! con comillas simples–y habría que devolver esa variable
		$resultHTML = "
    <!DOCTYPE html>
    <html>
      <head>
        <meta charset='utf-8'>
				<script src='js/jquery-3.2.1.min.js'></script>
				<script src='js/loginProfe.js'></script>
        <title>NUEVO REGISTRO</title>
      </head>
      <body>

        <div>
          <form>
            <input type='text' name='name' placeholder='name'>
            <input type='text' name='email' placeholder='email'>
            <input type='text' name='password' placeholder='password'>

            <button id='btn_register' type='button'>Registrarme</button>
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
