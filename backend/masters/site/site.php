<?php
class Site
{
    //Get All Site
  function getSite()
  {
    global $conn;
    $query = "SELECT * FROM tbl_site_master ORDER BY site_id DESC";
    $response = array();
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }

  //Get Site by id
  function getSiteById($siteid)
  {
    global $conn;
    $query = "SELECT * FROM tbl_site_master where site_id=" . $siteid;
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

  //Save Site
  function saveSite($site)
  {
    global $conn;
    $query = "INSERT INTO tbl_site_master (site_id,name, address, contactno, emailid, poc) VALUES ('" . $site->site_id . "', '" . $site->name . "', '" . $site->address . "', '" . $site->contactno . "', '" . $site->emailid . "','" . $site->poc . "')";
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
  }

  //Update Site
  function updateSite($site_id)
  {
    global $conn;
    $query = "UPDATE tbl_site_master SET name='" . $site->name . "', address='" . $site->address . "', contactno='" . $site->contactno . "', emailid='" . $site->emailid. "',poc='".$site->poc."' WHERE site_id=$site->site_id.";
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
  }

  //Delete Site
  function deleteSite($site_id)
  {
    global $conn;
    $query = "DELETE FROM tbl_site_master WHERE site_id=" . $site_id;
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
  }
}
