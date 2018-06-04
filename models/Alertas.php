<?php
require_once 'Connection.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Alertas
 *
 * @author alejandro
 */
class Alertas {
    //put your code here
    private $idalertas;
    private $latitud;
    private $longitud;
    private $atendida;
    
    function __construct() {
        
    }
    
    function getIdalertas() {
        return $this->idalertas;
    }

    function getLatitud() {
        return $this->latitud;
    }

    function getLongitud() {
        return $this->longitud;
    }

    function getAtendida() {
        return $this->atendida;
    }

    function setIdalertas($idalertas) {
        $this->idalertas = $idalertas;
    }

    function setLatitud($latitud) {
        $this->latitud = $latitud;
    }

    function setLongitud($longitud) {
        $this->longitud = $longitud;
    }

    function setAtendida($atendida) {
        $this->atendida = $atendida;
    }

    function getAllAlerts(){
        try {
            $conn = new Connection();
            $query = $conn->getConnection()->prepare("SELECT * FROM alertas");
            $query->execute();
            $conn->closeConnection();
            return $query->fetchAll(PDO::FETCH_CLASS, __CLASS__);
        } catch (PDOException $e) {
            echo "Error al conseguir los platos ... ".$e->getMessage();
            die();
        }
    }

    public function saveAlerta(){
        try {
            $conn = new Connection();
            $query = $conn->getConnection()->prepare("INSERT INTO alertas (latitud, longitud, atendida) VALUES (?, ?, ?)");
            $lat = $this->getLatitud();
            $lon = $this->getLongitud();
            $aten = FALSE;
            $query->bindParam(1, $lat);
            $query->bindParam(2, $lon);
            $query->bindParam(3, $aten);
            $query->execute();
            echo 'Registro de alerta exitoso';
            $conn->closeConnection();
        } catch (PDOException $e) {
            echo "Error en la insercción de alerta ... ".$e->getMessage();
            die();
        }
    }

}
