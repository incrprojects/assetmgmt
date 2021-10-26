<?php
class Manufacture
{
    //Get All Manufacture
  function getManufacture()
  {
    global $conn;
    $query = "SELECT * FROM tbl_manf_master ORDER BY id DESC";
    $response = array();
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }

  //Get Vendor by id
  function getManufactureById($manfid)
  {
    global $conn;
    $query = "SELECT * FROM tbl_manf_master where id=" . $manfid;
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

  //Save Manufacture
  function saveManufacture($manf)
  {
    global $conn;
    $query = "INSERT INTO tbl_manf_master (name, address, contactno, emailid) VALUES ('" . $manf->name . "', '" . $manf->address . "', '" . $manf->contactno . "', '" . $manf->emailid . "')";
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
  }

  //Update Manufacture
  function updateManufacture($manf)
  {
    global $conn;
    $query = "UPDATE tbl_manf_master SET name='" . $manf->name . "', address='" . $manf->address . "', contactno='" . $manf->contactno . "', emailid='" . $manf->emailid. "' WHERE id=$manf->id.";
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
  }

  //Delete Manufacture
  function deleteManufacture($id)
  {
    global $conn;
    $query = "DELETE FROM tbl_manf_master WHERE id=" . $id;
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
  }
}
