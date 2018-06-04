<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connection
 *
 * @author alejandro
 */
class Connection {

    //put your code here

    private $connection;

    public function __construct() {
        try {
            $this->connection = new PDO("mysql:host=127.0.0.1;dbname=alertinha", "root", "");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_PERSISTENT, TRUE);
            $this->connection->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            echo "Error en la conexion: " . $e->getMessage();
            die();
        }
    }

    public function getConnection() {
        return $this->connection;
    }

    public function closeConnection(){
        $this->connection = NULL;
    }
}
