<?php
header('Access-Control-Allow-Origin: *');

$output = [
    'success' => false
];

require_once('db_connect.php');

$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'];

switch($method){
    case 'GET':
        include_once("get/$action.php");       
        break;
    case 'POST':
        include_once("post/$action.php");  
        break;
    case 'PUT':
        $output['msg'] = 'put that thing back where you found it or so help me';
        break;
    case 'DELETE':
        $output['msg'] = 'EXTERMINATE';
        break;
    default:
        $output['error'] = "Unknown request method: $method";
}

$data = json_encode($output);

echo $data;
