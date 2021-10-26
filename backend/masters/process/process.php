<?php
class Process
{
    //Get All Process
  function getProcess()
  {
    global $conn;
    $query = "SELECT * FROM tbl_process_master ORDER BY id DESC";
    $response = array();
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }

  //Get Process by id
  function getProcessById($processid)
  {
    global $conn;
    $query = "SELECT * FROM tbl_process_master where id=" . $processid;
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

  //Save Process
  function saveProcess($process)
  {
    global $conn;
    $query = "INSERT INTO tbl_process_master (id,name, details) VALUES ('" . $process->id . "', '" . $process->name . "', '" . $process->details . "')";
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
  }

  //Update Process
  function updateProcess($process)
  {
    global $conn;
    $query = "UPDATE tbl_process_master SET id='" . $process->id . "', name='" . $process->name . "', details='" . $process->details . "' WHERE id=$process->id.";
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
  }

  //Delete Site
  function deleteProcess($id)
  {
    global $conn;
    $query = "DELETE FROM tbl_process_master WHERE id=" . $id;
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
  }
}
