<?php

include_once '../../includes/dbconnect.php';

if ($_GET['table']=='sales') {
    foreach($_POST['transaction_id'] as $selectedID) {
        $sql = "DELETE FROM sales WHERE transaction_id =$selectedID;";
        mysqli_query($conn, $sql);
    }

header("Location: ../sales-table.php?DeleteEntries=Successful");
}
else if ($_GET['table']=='product') {
    foreach($_POST['product_id'] as $selectedID) {
        $sql = "DELETE FROM product WHERE product_id =$selectedID;";
        mysqli_query($conn, $sql);
    }

header("Location: ../product-table.php?DeleteEntries=Successful");
}

?>