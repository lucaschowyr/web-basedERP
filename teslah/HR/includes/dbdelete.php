<?php

include_once '../../includes/dbconnect.php';


foreach($_POST['emp_id'] as $selectedID) {
    $sql = "DELETE FROM emp_info WHERE emp_id =$selectedID;";
    mysqli_query($conn, $sql);
}

header("Location: ../update_delete.php?DeleteEntries=Successful");

?>