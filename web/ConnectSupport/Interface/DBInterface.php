<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



interface DBInterface {
    /* Connects To the DB 
        returns TRUE if connection is established
        else return FALSE;
    */
    public function connect();
    /* Disconnect from DB 
       returns TRUE if connection is established
       else return FALSE; */
    public function disconnect();
    /*  executes the query in the DB and returns
        associative array with results 
        if there's an error, empty array is given   
     */
    public function executeQuery($query);
    
    /* 
    executes the update/delete/DROP whatever query
    and returns an integer that represents the number of
    affected rows
    */
    public function modifyQuery($query);
    
    /* checks if the connection is operative 
     */
    public function isAlive();
}
