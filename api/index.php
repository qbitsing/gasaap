<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
$route = $_GET['PATH_INFO'];
$route = explode('/', $route);
$resource = $route[0];
$action = $route[1];
$response = null;
switch ($resource) {
    case 'usuarios':
        include_once 'Conexion.php';
        $db = new Database();
        $cnx = $db->cnx;
        include_once 'Controllers/usersCtrl.php';
        $instance = new Usuario($cnx, $action);
    break;
    case 'mail':
        include_once 'Controllers/mailCtrl.php';
        $mail = new Mail($action);
        $response = $mail->response;
    break;
    default: 
     $response = array(
         'status' => 400,
         'message' => "No existe el recurso $resource"
     );
}
if($instance) $response = $instance->response;
echo json_encode($response);