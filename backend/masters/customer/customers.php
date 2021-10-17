<?php
class Customers
{
  //Get All Customers
  function getCustomers()
  {
    global $conn;
    $query = "SELECT * FROM tbl_customer_master ORDER BY id DESC";
    $response = array();
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }

  //Get Customer by id
  function getCustomerById($customerid)
  {
    global $conn;
    $query = "SELECT * FROM tbl_customer_master where id=" . $customerid;
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

  //Save Customer
  function saveCustomer($customer)
  {
    global $conn;
    $query = "INSERT INTO tbl_customer_master (name, address, contactno, emailid) VALUES ('" . $customer->name . "', '" . $customer->address . "', '" . $customer->contactno . "', '" . $customer->emailid . "')";
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
  }

  //Update Customer
  function updateCustomer($customer)
  {
    global $conn;
    $query = "UPDATE tbl_customer_master SET name='" . $customer->name . "', address='" . $customer->address . "', contactno='" . $customer->contactno . "', emailid='" . $customer->emailid. "' WHERE id = $customer->id.";
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
  }

  //Delete Customer
  function deleteCustomer($customerid)
  {
    global $conn;
    $query = "DELETE FROM tbl_customer_master WHERE id=" . $customerid;
    echo $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
  }
}
