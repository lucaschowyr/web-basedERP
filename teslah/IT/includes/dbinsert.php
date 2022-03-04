<?php 
	$db = mysqli_connect('localhost', 'root', '', 'ip_erp');

    $description = "";
    $priority = "";
    $status = "";
    $dept = "";
    $emp_name = "";
    $emp_id = "";
    $country = "";
	$ticket_id = 0;
	$update = false;

	if (isset($_POST['save'])) {
        $description = $_POST['description'];
        $priority = $_POST['priority'];
        $status = $_POST['status'];
        $dept = $_POST['dept'];
        $emp_name = $_POST['emp_name'];
        $emp_id = $_POST['emp_id'];
        $country = $_POST['country'];
		mysqli_query($db, "INSERT INTO it (
            description
            , priority
            , status
            , dept
            , emp_name
            , emp_id
            , country)
        VALUES (
            '$description'
            , '$priority'
            , '$status'
            , '$dept'
            , '$emp_name'
            , '$emp_id'
            , '$country'
            )");
		$_SESSION['message'] = "New Info Saved"; 
		header('location: ../itform.php');
	}

    $data=mysqli_query($db, "SELECT * FROM it");


    

if (isset($_POST['update'])) {
$id = $_POST['ticket_id'];
$description = $_POST['description'];
$priority = $_POST['priority'];
$status = $_POST['status'];
$dept = $_POST['dept'];
$emp_name = $_POST['emp_name'];
$emp_id = $_POST['emp_id'];
$country = $_POST['country'];

mysqli_query($db, "UPDATE it SET description='$description', priority='$priority', status='$status', dept='$dept', emp_name='$emp_name', emp_id='$emp_id', country='$country' WHERE ticket_id=$id");
$_SESSION['message'] = "New Info updated!"; 
header('location: ../table.php');
}


if (isset($_GET['del'])) {
$id = $_GET['del'];
mysqli_query($db, "DELETE FROM it WHERE ticket_id=$id");
$_SESSION['message'] = "Info deleted!"; 
header('location: table.php');
}
?>




