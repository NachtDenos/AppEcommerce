<?php
session_start();

$response = array();

if (isset($_SESSION['usuario'])) {
    $response['authenticated'] = true;
    $response['userRol']=$_SESSION['usuario']['RolUsuario'];
} else {
    $response['authenticated'] = false;
}

header('Content-Type: application/json');
echo json_encode($response);
?>