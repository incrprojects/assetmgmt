<?php

class Permissions {
    //Get All Permissions
    function getPermissions() {
        global $conn;
        $query = "SELECT * FROM tbl_user_permissions ORDER BY id DESC";
        $response = array();
        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)) {
            $response[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    //Get UPermissionsser by id
    function getPermissionsById($prmsid) {
        global $conn;
        $query = "SELECT * FROM tbl_user_permissions where id=" . $prmsid;
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
    //Save Permissions
    function savePermissions($prms) {
        global $conn;
        $query = "INSERT INTO tbl_user_permissions (id, role_id, per_process, per_view, per_create, per_update,per_delete) VALUES ('" . $prms->id . "','" . $prms->role_id . "','" . $prms->per_process . "', '" . $prms->per_view . "', '" . $prms->per_create . "', '" . $prms->per_update . "', '" . $prms->per_delete . "')";
        echo $result = mysqli_query($conn, $query);
        header('Content-Type: application/json');
    }
    //Update Permissions
    function updatePermissions($prms) {
        global $conn;
        $query = "UPDATE tbl_user_permissions SET role_id='" . $prms->role_id . "' , per_process='" . $prms->per_process . "',  per_view='" . $prms->per_view . "',  per_create='" . $prms->per_create . "',  per_update='" . $prms->per_update . "',  per_delete='" . $prms->per_delete . "' WHERE id = $prms->id.";
        echo $result = mysqli_query($conn, $query);
        header('Content-Type: application/json');
    }
    //Delete Permissions
    function deletePermissions($prmsid) {
        global $conn;
        $query = "DELETE FROM tbl_user_permissions WHERE id=" . $prmsid;
        echo $result = mysqli_query($conn, $query);
        header('Content-Type: application/json');
    }
}
