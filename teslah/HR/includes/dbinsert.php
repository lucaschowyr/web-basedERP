<?php

include_once '../../includes/dbconnect.php';

$empId = $_POST['femp_id'];
$empName = $_POST['femp_name'];
$userId = $_POST['fuser_id'];
$userPwd = $_POST['fuser_pwd'];
$dept = $_POST['fdept'];
$country = $_POST['fcountry'];
$jobPosition = $_POST['fjob_position'];
$userAuth = $_POST['fauth'];
$apptDate = $_POST['fappt_date'];
$gender = $_POST['fgender'];
$status = $_POST['fstatus'];


$sql = "INSERT INTO emp_info (
    emp_id
    , emp_name
    , user_id
    , user_pwd
    , dept
    , country
    , auth
    , appt_date
    , gender
    , status
    , job_position
) VALUES (
    ' $empId'
    , '$empName'
    , '$userId'
    , '$userPwd'
    , '$dept'
    , '$country'
    , '$userAuth'
    , '$apptDate'
    , '$gender'
    , '$status'
    , '$jobPosition'
    );";

$result = mysqli_query($conn, $sql);
// echo $result;
// print_r($sql);

if($result) {
    header("Location: ../register.php?Entries=Successful");
} else {
    header("Location: ../register.php?Entries=Error");
}

?>
