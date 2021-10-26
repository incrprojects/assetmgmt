<?php
class Role
{
    //Get All Role
  function getRole()
  {
    global $conn;
    $query = "SELECT * FROM tbl_user_role ORDER BY id DESC";
    $response = array();
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }

  //Get Role by id
  function getRoleById($roleid)
  {
    global $conn;
    $query = "SELECT * FROM tbl_user_role where id=" . $roleid;
    $response = array();
    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);
    if ($rows > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
      }
    } else {
      array_push($response, "No Data Found");
    }

    header('Content-Type: application/json');
    echo json_encode($response);
  }

  //Save Role
  function saveRole($role)
  {
    global $conn;
    $query = "INSERT INTO tbl_user_role (id,name) VALUES ('" . $role->id . "', '" . $role->name . "')";
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
  }

  //Update Role
  function updateRole($role)
  {
    global $conn;
    $query = "UPDATE tbl_user_role SET id='" . $role->id . "', name='" . $role->name . "' WHERE id=$role->id.";
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
  }

  //Delete Role
  function deleteRole($id)
  {
    global $conn;
    $query = "DELETE FROM tbl_user_role WHERE id=" . $id;
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
  }
}
