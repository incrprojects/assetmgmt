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
include_once('vendors.php');
$request_method = $_SERVER["REQUEST_METHOD"];
$data = json_decode(file_get_contents("php://input"));
$vendor = new Vendors;
switch($request_method) {
    case 'GET' : if(isset($_GET["vendorid"])) {
        $vendor_id = intval($_GET["vendorid"]);
        $vendor->getVendorById($vendor_id);
    } else {
        $vendor->getVendors();
    }
    break;
    case 'POST' : $vendor->saveVendor($data);
    break;
    case 'PUT' : $vendor->updateVendor($data);
    break;
    case 'DELETE' : if(isset($_GET["vendorid"])) {
        $vendor_id = intval($_GET["vendorid"]);
        $vendor->deleteVendor($vendor_id);
    }
    break;
    default : header("HTTP/1.0 405 Method Not Allowed");
    break;
}
