<?php

    require_once __DIR__."/testTeacherController.php";
    //echo json_encode($_POST);

    //$_POST ["name"] = "Judith";
    //$_POST ["email"] = "judith@emailfalso.com";
    //$_POST ["password"] = "1234";
    header('Access-Control-Allow-Origin: *');


    if(!isset($_SESSION)){
          session_start();
    }

    if(!isset($_POST)){
          $controller = new testTeacherController();
          $result = $controller->checkTestTeacher(); //No olvidar
          echo json_encode($result);
          return;
    } else {
           $action = $_POST['action'];
           $controller = new testTeacherController();
           $result = $controller->$action();

           echo json_encode($result);
           return;
    }

 ?>
