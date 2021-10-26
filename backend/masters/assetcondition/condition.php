<?php
class Condition
{
    //Get All Type
  function getCondition()
  {
    global $conn;
    $query = "SELECT * FROM tbl_asset_condition_master ORDER BY id DESC";
    $response = array();
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }

  //Get Type by id
  function getConditionById($coditionid)
  {
    global $conn;
    $query = "SELECT * FROM tbl_asset_condition_master where id=" . $coditionid;
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

  //Save Type
  function saveCondition($condition)
  {
    global $conn;
    $query = "INSERT INTO tbl_asset_condition_master (id,name, details) VALUES ('" . $condition->id . "', '" . $condition->name . "', '" . $condition->details . "')";
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
  }

  //Update Sittypee
  function updateCondition($condition)
  {
    global $conn;
    $query = "UPDATE tbl_asset_condition_master SET id='" . $condition->id . "', name='" . $condition->name . "', details='" . $condition->details . "' WHERE id=$condition->id.";
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
  }

  //Delete Site
  function deleteCondition($id)
  {
    global $conn;
    $query = "DELETE FROM tbl_asset_condition_master WHERE id=" . $id;
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
  }
}
