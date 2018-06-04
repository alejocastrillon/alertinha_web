<?php
require_once 'models/Alertas.php';
$alertas = new Alertas();
$dataalerta = $alertas->getAllAlerts();