<?php

class Type {
    //Get All Type
    function getType() {
        global $conn;
        $query = "SELECT * FROM tbl_asset_type ORDER BY id DESC";
        $response = array();
        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)) {
            $response[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    //Get Type by id
    function getTypeById($typeid) {
        global $conn;
        $query = "SELECT * FROM tbl_asset_type where id=" . $typeid;
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
    //Save Type
    function saveType($type) {
        global $conn;
        $query = "INSERT INTO tbl_asset_type (id,name, details) VALUES ('" . $type->id . "', '" . $type->name . "', '" . $type->details . "')";
        echo $result = mysqli_query($conn, $query);
        header('Content-Type: application/json');
    }
    //Update Sittypee
    function updateType($type) {
        global $conn;
        $query = "UPDATE tbl_asset_type SET id='" . $type->id . "', name='" . $type->name . "', details='" . $type->details . "' WHERE id=$type->id.";
        echo $result = mysqli_query($conn, $query);
        header('Content-Type: application/json');
    }
    //Delete Site
    function deleteType($id) {
        global $conn;
        $query = "DELETE FROM tbl_asset_type WHERE id=" . $id;
        echo $result = mysqli_query($conn, $query);
        header('Content-Type: application/json');
    }
}
