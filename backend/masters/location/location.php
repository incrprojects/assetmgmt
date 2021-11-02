<?php

class Location {
    //Get All Location
    function getLocation() {
        global $conn;
        $query = "SELECT * FROM tbl_location_master ORDER BY loc_id DESC";
        $response = array();
        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)) {
            $response[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    //Get Location by id
    function getLocationById($loc_id) {
        global $conn;
        $query = "SELECT * FROM tbl_location_master where loc_id=" . $loc_id;
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
    //Save Location
    function saveLocation($location) {
        global $conn;
        $query = "INSERT INTO tbl_location_master (loc_id, site_id, name, address, contactno, emailid) VALUES ('" . $location->loc_id . "','" . $location->site_id . "', '" . $location->name . "', '" . $location->address . "', '" . $location->contactno . "', '" . $location->emailid . "')";
        echo $result = mysqli_query($conn, $query);
        header('Content-Type: application/json');
    }
    //Update Location
    function updateLocation($location) {
        global $conn;
        $query = "UPDATE tbl_location_master SET name='" . $location->name . "', address='" . $location->address . "', contactno='" . $location->contactno . "', emailid='" . $location->emailid . "',site_id='" . $location->site_id . "' WHERE loc_id=$location->loc_id.";
        echo $result = mysqli_query($conn, $query);
        header('Content-Type: application/json');
    }
    //Delete Location
    function deleteLocation($locid) {
        global $conn;
        $query = "DELETE FROM tbl_location_master WHERE loc_id=" . $locid;
        echo $result = mysqli_query($conn, $query);
        header('Content-Type: application/json');
    }
}
