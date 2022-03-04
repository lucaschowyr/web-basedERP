<?php

include_once '../../includes/dbconnect.php';

if ($_GET['table']=='sales') {

  for ($row = 0; $row < count($_POST['transaction_id']); $row++) {

    $selectedID = $_POST['transaction_id'][$row];
    $customer_name = $_POST['fCustomerName'][$row];
    $salesperson_name = $_POST['fSalespersonName'][$row];
    $employee_id = $_POST['fEmployeeID'][$row];
    $product_id = $_POST['fProductID'][$row];
    $product = $_POST['fProduct'][$row];
    $model = $_POST['fModel'][$row];
    $qty = $_POST['fQty'][$row];
    $country = $_POST['fCountry'][$row];
    $date = date('Y-m-d H:i:s', time());
    //  $date = date('Y-m-d H:i:s', date_default_timezone_set("Asia/Singapore"));
    
  
    $sql = "UPDATE sales
    SET
    date = '$date'
    , product_id = '$product_id'
    , product = '$product'
    , model = '$model'
    , qty = '$qty'
    , salesperson_name = '$salesperson_name'
    , employee_id = '$employee_id'
    , customer_name = '$customer_name'
    , country = '$country'
    WHERE transaction_id =$selectedID;";
  
    $result = mysqli_query($conn, $sql);

    print_r($conn);
    print_r($result);
  
    header("Location: ../sales-table.php?UpdateEntries=Successful");
  }
  

}
else if ($_GET['table']=='product') {

  for ($row = 0; $row < count($_POST['product_id']); $row++) {

    $selectedID = $_POST['product_id'][$row];
    $product = $_POST['fProduct'][$row];
    $model = $_POST['fModel'][$row];
    $price = $_POST['fPrice'][$row];
    $country = $_POST['fCountry'][$row];
    $currency = $_POST['fCurrency'][$row];
    
    $sql = "UPDATE product
    SET
    product = '$product'
    , model = '$model'
    , price = '$price'
    , country = '$country'
    , currency = '$currency'
    WHERE product_id =$selectedID;";

    $result = mysqli_query($conn, $sql);

    print_r($conn);
    print_r($result);

    header("Location: ../product-table.php?UpdateEntries=Successful");
  }
}

?>


