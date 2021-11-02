<?php

class Department {
    //Get All Department
    function getDepartment() {
        global $conn;
        $query = "SELECT * FROM tbl_dept_master ORDER BY id DESC";
        $response = array();
        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)) {
            $response[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    //Get Department by id
    function getDepartmentById($deptid) {
        global $conn;
        $query = "SELECT * FROM tbl_dept_master where id=" . $deptid;
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
    //Save Department
    function saveDepartment($dept) {
        global $conn;
        $query = "INSERT INTO tbl_dept_master (id,name, address, contactno, emailid,poc ) VALUES ('" . $dept->id . "','" . $dept->name . "', '" . $dept->address . "', '" . $dept->contactno . "', '" . $dept->emailid . "', '" . $dept->poc . "')";
        echo $result = mysqli_query($conn, $query);
        header('Content-Type: application/json');
    }
    //Update Department
    function updateDepartment($dept) {
        global $conn;
        $query = "UPDATE tbl_dept_master SET name='" . $dept->name . "', address='" . $dept->address . "', contactno='" . $dept->contactno . "', emailid='" . $dept->emailid . "', poc='" . $dept->poc . "' WHERE id=$dept->id.";
        echo $result = mysqli_query($conn, $query);
        header('Content-Type: application/json');
    }
    //Delete Department
    function deleteDepartment($id) {
        global $conn;
        $query = "DELETE FROM tbl_dept_master WHERE id=" . $id;
        echo $result = mysqli_query($conn, $query);
        header('Content-Type: application/json');
    }
}
