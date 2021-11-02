<?php

class Vendors {
    //Get All Vendors
    function getVendors() {
        global $conn;
        $query = "SELECT * FROM tbl_vendor_master ORDER BY id DESC";
        $response = array();
        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)) {
            $response[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    //Get Vendor by id
    function getVendorById($vendorid) {
        global $conn;
        $query = "SELECT * FROM tbl_vendor_master where id=" . $vendorid;
        $response = array();
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);
        if($rows > 0) {

            while($row = mysqli_fetch_assoc($result)) {
                $response[] = $row;
            }
        } else {
            array_push($response, "No Data Found");
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    //Save Vendor
    function saveVendor($vendor) {
        global $conn;
        $query = "INSERT INTO tbl_vendor_master (name, address, contactno, emailid) VALUES ('" . $vendor->name . "', '" . $vendor->address . "', '" . $vendor->contactno . "', '" . $vendor->emailid . "')";
        echo $result = mysqli_query($conn, $query);
        header('Content-Type: application/json');
    }
    //Update Vendor
    function updateVendor($vendor) {
        global $conn;
        $query = "UPDATE tbl_vendor_master SET name='" . $vendor->name . "', address='" . $vendor->address . "', contactno='" . $vendor->contactno . "', emailid='" . $vendor->emailid . "' WHERE id=$vendor->id.";
        echo $result = mysqli_query($conn, $query);
        header('Content-Type: application/json');
    }
    //Delete Vendor
    function deleteVendor($user_id) {
        global $conn;
        $query = "DELETE FROM tbl_vendor_master WHERE id=" . $user_id;
        echo $result = mysqli_query($conn, $query);
        header('Content-Type: application/json');
    }
}
