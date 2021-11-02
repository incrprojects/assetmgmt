<?php

class User {
    //Get All User
    function getUser() {
        global $conn;
        $query = "SELECT * FROM tbl_user ORDER BY id DESC";
        $response = array();
        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)) {
            $response[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    //Get User by id
    function getUserById($userid) {
        global $conn;
        $query = "SELECT * FROM tbl_user where id=" . $userid;
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
    //Save Usr
    function saveUser($user) {
        global $conn;
        $query = "INSERT INTO tbl_user (id,role_id,name, address, contactno, emailid) VALUES ('" . $user->id . "','" . $user->role_id . "','" . $user->name . "', '" . $user->address . "', '" . $user->contactno . "', '" . $user->emailid . "')";
        echo $result = mysqli_query($conn, $query);
        header('Content-Type: application/json');
    }
    //Update User
    function updateUser($user) {
        global $conn;
        $query = "UPDATE tbl_user SET role_id='" . $user->role_id . "' , name='" . $user->name . "', address='" . $user->address . "', contactno='" . $user->contactno . "', emailid='" . $user->emailid . "' WHERE id = $user->id.";
        echo $result = mysqli_query($conn, $query);
        header('Content-Type: application/json');
    }
    //Delete User
    function deleteUser($userid) {
        global $conn;
        $query = "DELETE FROM tbl_user WHERE id=" . $userid;
        echo $result = mysqli_query($conn, $query);
        header('Content-Type: application/json');
    }
}
