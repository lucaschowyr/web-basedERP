<?php

include_once '../../includes/dbconnect.php';

if ($_GET['table']=='sales') {

$customer_name = $_POST['fCustomerName'];
$salesperson_name = $_POST['fSalespersonName'];
$employee_id = $_POST['fEmployeeID'];
$product_id = $_POST['fProductID'];
$product = $_POST['fProduct'];
$model = $_POST['fModel'];
$qty = $_POST['fQty'];
$country = $_POST['fCountry'];


$sql = "INSERT INTO sales (
    product_id
    , product
    , model
    , qty
    , salesperson_name
    , employee_id
    , customer_name
    , country
) VALUES (
    '$product_id'
    , '$product'
    , '$model'
    , '$qty'
    , '$salesperson_name'
    , '$employee_id'
    , '$customer_name'
    , '$country'
    );";
    

$result = mysqli_query($conn, $sql);
// echo $sql;
// print_r($conn);
// echo $result;
if($result && mysqli_affected_rows($conn)==1) {
    header("Location: ../sales-form.php?Entries=Successful");
} else {
    header("Location: ../sales-form.php?Entries=Error");
}
}

else if ($_GET['table']=='product') {

$product = $_POST['fProduct'];
$model = $_POST['fModel'];
$price = $_POST['fPrice'];
$country = $_POST['fCountry'];
$currency = $_POST['fCurrency'];

$sql = "INSERT INTO product (
    product
    , model
    , price
    , country
    , currency
) VALUES (
    '$product'
    , '$model'
    , '$price'
    , '$country'
    , '$currency'
    );";
    
    
    $result = mysqli_query($conn, $sql);
    // echo $sql;
    // print_r($conn);
    // echo $result;
    if($result && mysqli_affected_rows($conn)==1) {
        header("Location: ../product-form.php?Entries=Successful");
    } else {
        header("Location: ../product-form.php?Entries=Error");
    }
}
?>




