<?php
require '../../../vendor/autoload.php';
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
require("constants.php");

class Customers {
    //Get All Customers
    function getCustomers() {
        global $conn;
        $response = array();
        $result = mysqli_query($conn, CUSTOMERS_QUERY);
        $count = mysqli_num_rows($result);
        if($count > 0) {

            while($row = mysqli_fetch_assoc($result)) {
                $response[] = $row;
            }
            header('Content-Type: application/json');
            $returnData =["serviceCall" => "/customers", "path" => "/masters/customers", "requestId" => substr(md5(microtime()), 0, 10), "data" => $response];
        } else 
            $returnData =["serviceCall" => "/customers", "path" => "/masters/customers", "requestId" => substr(md5(microtime()), 0, 10), "data" => $response];
        echo json_encode($returnData);
    }
    //Get Customer by id
    function getCustomerById($customerid) {
        global $conn;
        $query = CUSTOMER_QUERY_ID . $customerid;
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        if($count > 0) {

            while($row = mysqli_fetch_assoc($result)) {
                $response[] = $row;
            }
            $returnData =["serviceCall" => "/customers/" . $customerid, "path" => "/masters/customers", "requestId" => substr(md5(microtime()), 0, 10), "data" => $response];
        } else {
            $returnData =["serviceCall" => "/customers/" . $customerid, "path" => "/masters/customers", "requestId" => substr(md5(microtime()), 0, 10), "message" => NO_CUST_DATA_FOUND];
        }
        header('Content-Type: application/json');
        echo json_encode($returnData);
    }
    //Save Customer
    function saveCustomer($customer) {
        $logger = new Logger('main');
        $logger->pushHandler(new StreamHandler(MYLOG_PATH, Logger::DEBUG));
        global $conn;
        $result = mysqli_query($conn, CUSTOMER_SAVE_QUERY . 
                               $customer->name . 
                               "', '" . 
                               $customer->address . 
                               "', '" . 
                               $customer->contactno . 
                               "', '" . 
                               $customer->emailid . 
                               "')");
        if($result == 1)
            $returnData =["serviceCall" => "/customers/save", "path" => "/masters/customers/save", "requestId" => substr(md5(microtime()), 0, 10), "message" => CUSTOMER_SAVE];
        else 
            $returnData =["serviceCall" => "/customers/save", "path" => "/masters/customers/save", "requestId" => substr(md5(microtime()), 0, 10), "message" => CUSTOMER_SAVE_ERROR];
        header('Content-Type: application/json');
        $logger->info(CUSTOMER_SAVE);
        echo json_encode($returnData);
    }
    //Update Customer
    function updateCustomer($customer) {
        $logger = new Logger('main');
        $logger->pushHandler(new StreamHandler(MYLOG_PATH, Logger::DEBUG));
        global $conn;
        $query = "UPDATE tbl_customer_master SET name='" . $customer->name . "', address='" . $customer->address . "', contactno='" . $customer->contactno . "', emailid='" . $customer->emailid . "' WHERE id = $customer->id.";
        $result = mysqli_query($conn, $query);
        if($result == 1)
            $returnData =["serviceCall" => "/customers/update", "path" => "/masters/customers/update", "requestId" => substr(md5(microtime()), 0, 10), "message" => CUSTOMER_UPDATE];
        else 
            $returnData =["serviceCall" => "/customers/update", "path" => "/masters/customers/update", "requestId" => substr(md5(microtime()), 0, 10), "message" => CUSTOMER_UPDATE_ERROR];
        header('Content-Type: application/json');
        $logger->info(CUSTOMER_UPDATE);
        echo json_encode($returnData);
    }
    //Delete Customer
    function deleteCustomer($customerid) {
        $logger = new Logger('main');
        $logger->pushHandler(new StreamHandler(MYLOG_PATH, Logger::DEBUG));
        global $conn;
        $dataquery = CUSTOMER_QUERY_ID . $customerid;
        $dataresult = mysqli_query($conn, $dataquery);
        $count = mysqli_num_rows($dataresult);
        if($count > 0) {
            $query = CUSTOMER_DELETE_QUERY . $customerid;
            $result = mysqli_query($conn, $query);
            if($result == 1)
                $returnData =["serviceCall" => "/customers/delete", "path" => "/masters/customers/delete", "requestId" => substr(md5(microtime()), 0, 10), "message" => CUSTOMER_DELETE];
            else 
                $returnData =["serviceCall" => "/customers/delete", "path" => "/masters/customers/delete", "requestId" => substr(md5(microtime()), 0, 10), "message" => CUSTOMER_DELETE_ERROR];
            header('Content-Type: application/json');
        } else {
            $returnData =["serviceCall" => "/customers/delete/" . $customerid, "path" => "/masters/customers/delete", "requestId" => substr(md5(microtime()), 0, 10), "message" => NO_CUST_DATA_FOUND];
        }
        $logger->info(CUSTOMER_DELETE_ERROR);
        echo json_encode($returnData);
    }
}
