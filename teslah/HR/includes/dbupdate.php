<?php

include_once '../../includes/dbconnect.php';

// echo count($_POST['emp_id']);

for ($row = 0; $row < count($_POST['emp_id']); $row++) {

  $selectedID = $_POST['emp_id'][$row];
  $empName = $_POST['femp_name'][$row];
  $userId = $_POST['fuser_id'][$row];
  $userPwd = $_POST['fuser_pwd'][$row];
  $dept = $_POST['fdept'][$row];
  $country = $_POST['fcountry'][$row];
  $jobPosition = $_POST['fjob_position'][$row];
  $apptDate = $_POST['fappt_date'][$row];
  $gender = $_POST['fgender'][$row];
  $status = $_POST['fstatus'][$row];  
  $userAuth= $_POST['fauth'][$row];

  
  $sql = "UPDATE emp_info
  SET
  emp_name = '$empName'
  , user_id = '$userId'
  , user_pwd = '$userPwd'
  , dept = '$dept'
  , country= '$country'
  , job_position = '$jobPosition'
  , appt_date = '$apptDate'
  , gender = '$gender'
  , status = '$status'
  , auth = '$userAuth'
  WHERE emp_id =$selectedID;";

  mysqli_query($conn, $sql);
}

header("Location: ../update_delete.php?UpdateEntries=Successful");

?>














