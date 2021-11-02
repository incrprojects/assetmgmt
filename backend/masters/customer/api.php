<?php
if(isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    //If required
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');
    // cache for 1 day
}
if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, PUT, OPTIONS");
    if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    exit(0);
}
// Connect to database
include_once('../../config/db.php');
$database = new Database();
$conn = $database->connect();
require '../../middlewares/Auth.php';
include_once('customers.php');
$returnData =["success" => 0, "status" => 401, "message" => "Unauthorized"];
$allHeaders = getallheaders();
$request_method = $_SERVER["REQUEST_METHOD"];
$data = json_decode(file_get_contents("php://input"));
$customer = new Customers;
$auth = new Auth($conn, $allHeaders);
$returnData =["success" => 0, "status" => 401, "message" => "Unauthorized"];
switch($request_method) {
    case 'GET' : if($auth->isAuth()) {
        if(isset($_GET["customerid"])) {
            $customerid = intval($_GET["customerid"]);
            $customer->getCustomerById($customerid);
        } else {
            $customer->getCustomers();
        }
    } else {
        echo json_encode($returnData);
    }
    break;
    case 'POST' : if($auth->isAuth()) {
        $customer->saveCustomer($data);
    } else {
        echo json_encode($returnData);
    }
    break;
    case 'PUT' : if($auth->isAuth()) {
        $customer->updateCustomer($data);
    } else {
        echo json_encode($returnData);
    }
    break;
    case 'DELETE' : if($auth->isAuth()) {
        if(isset($_GET["customerid"])) {
            $customerid = intval($_GET["customerid"]);
            $customer->deleteCustomer($customerid);
        }
    } else {
        echo json_encode($returnData);
    }
    break;
    default : header("HTTP/1.0 405 Method Not Allowed");
    break;
}
$database->disconnect($conn);

?>