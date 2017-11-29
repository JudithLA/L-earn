<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../Interface/DBInterface.php';

class MysqlDBImplementation implements DBInterface {
    
    // representa mi conexión con la DB
    private $conn; 
    
    private $DBname;
    private $DBhost;
    private $user;
    private $pass;
    private $port;

    public function __construct($DBhost, $port, $DBname, $user, $pass) {
        $this->DBhost = $DBhost;
        $this->DBname = $DBname;
        $this->user = $user;
        $this->pass = $pass;
        $this->port = $port;
        $this->connect();
    }
    public function __destruct() {
        /* aquí tendré que destruir la conexión
           COMO EN DISCONNECT 
        */
        $this->disconnect();
    }
    //put your code here
    public function connect() {
        // ALGO TENGO QUE HACER CON LA CONEXIÓN
        // USO EL RESTO DE ATRIBUTOS PARA 
        // ESTABLECER LA CONEXIÓN
        
        $this->conn = mysqli_connect($this->DBhost, $this->user, $this->pass,
                $this->DBname, $this->port);
        

        return !mysqli_errno($this->conn);
    }

    public function disconnect() {
        // ROMPO LA CONEXIÓN
        return mysqli_close($this->conn);
    }

    
    public function executeQuery($query) {
        // USO LA CONEXIÓN PARA MANDAR LA QUERY
        if(!$this->isAlive()){
            $this->connect();
        }
        
        $queryObj = mysqli_query($this->conn, $query);
        $resultMatrix = array();
        while($row = mysqli_fetch_assoc($queryObj)){
            $resultMatrix[] = $row; 
        }
        
        return $resultMatrix;
    }
    
    public function modifyQuery($query) {
        /* we have to reconnect if the connection
         has gone away */
        if(!$this->isAlive()){
            $this->connect();
        }
        
        $result = mysqli_query($this->conn, $query);
        $affectedRows = 0;
        if($result){
            $affectedRows = mysqli_affected_rows($this->conn);
        } 
        return $affectedRows;
        
    }
    
    public function isAlive() {
        // COMPRUEBO QUE LA CONEXIÓN ESTÁ ACTIVA
        return mysqli_ping($this->conn);
    }

}
