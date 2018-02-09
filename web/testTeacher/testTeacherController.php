<?php
require_once __DIR__ . "/testTeacherModel.php";
require_once __DIR__ . "/testTeacherView.php";


class testTeacherController {

				//Constructor (crea la clase)
				/*function __construct(){

				}

				//Destructor (Destruye la clase)
				function __destruct(){

				}*/


				public function welcomeTestController(){
									$view = new testTeacherView();
									return $view->welcomeTestView();
				}


				public function checkTestTeacherController(){

									$_SESSION ["id"];
									$pickEmail = $_POST ["email"];
									$pickPass = $_POST ["password"];

									$model = new testTeacherModel();

									$idUser = $model->createTeacher($pickName,$pickEmail,$pickPass);


									if($idUser){
													//session_start();
													$_SESSION ["id"] = $idUser;
										      $result['status'] = 'OK';
													$result['url'] = "http://www.publico.es";
										      $result['idUser'] = $idUser;
										      return $result;
									}
									else{
													$failLogin ["status"] = 0;
													$failLogin["message"] = "la has cagado amigo";
													return $failLogin;
									}
				}







}
?>
