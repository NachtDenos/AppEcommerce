<?php
session_start();

$response = array();

// Destruye la sesión actual
session_destroy();

$response['success'] = true;

header('Content-Type: application/json');
echo json_encode($response);
?>