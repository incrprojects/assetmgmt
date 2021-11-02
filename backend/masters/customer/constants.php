<?php
define("MYLOG_PATH", '../../../logs/app.log');
//Queries
define("CUSTOMERS_QUERY", "SELECT * FROM tbl_customer_master ORDER BY id DESC");
define("CUSTOMER_QUERY_ID", "SELECT * FROM tbl_customer_master where id=");
define("CUSTOMER_SAVE_QUERY", "INSERT INTO tbl_customer_master (name, address, contactno, emailid) VALUES ('");
define("CUSTOMER_DELETE_QUERY", "DELETE FROM tbl_customer_master WHERE id=");
//Messages
define("CUSTOMER_SAVE", "Customer Details Saved Successfully");
define("CUSTOMER_SAVE_ERROR", "Error while Saving Customer Details");
define("CUSTOMER_UPDATE", "Customer Details Updated Successfully");
define("CUSTOMER_UPDATE_ERROR", "Error while Updating Customer Details");
define("CUSTOMER_DELETE", "Customer Details Deleted Successfully");
define("CUSTOMER_DELETE_ERROR", "Error while Deleting Customer Details");
define("NO_CUST_DATA_FOUND", "No Data found for given customer id");

?>