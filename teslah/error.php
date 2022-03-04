<?php

session_start();

if (isset($_SESSION['loginUserid'])) {

$loginUserid = $_SESSION['loginUserid'];
$userDept = strtolower($_SESSION['dept']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>TeslahSG Pte Ltd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="error.css">
</head>

<?php
if ($_GET['status'] == 'notloggedin')
{ echo "<body style='background-color: #9ac1f3;'>";
} else if ($_GET['status'] == 'accessdenied')
{ echo "<body style='background-color: #eb7a7a;'>";
} else if ($_GET['status'] == 'deactivated')
{ echo "<body style='background-color: #808080;'>";
}
?> 
    
    <div class="container" role="alert">

    <?php
    if ($_GET['status'] == 'notloggedin') {
        echo "<span class='d-flex justify-content-center pb-5'><img width='250' src='https://cdn-icons-png.flaticon.com/512/295/295128.png'></span>";
        echo "<h1 class='text-center'>Error 401</h1>";
        echo "<h5 class='text-center'>You are not logged in! - You will be redirected in a moment</h5>";
        header('Refresh: 3; URL=login.php?status=notloggedin');

    }
    else if ($_GET['status'] == 'accessdenied') {
        echo "<span class='d-flex justify-content-center pb-5'><img width='250' src='https://cdn-icons-png.flaticon.com/512/1803/1803612.png'></span>";
        echo "<h1 class='text-center'>Error 403</h1>";
        echo "<h5 class='text-center'>Sorry, you do not have access to this page.</h5>";
        echo "<div class='text-center py-2'><button class='btn btn-outline-light'><a style='all:unset' href='".$userDept."/index.php'>Go Back</a></button></div>";
    }
    else if ($_GET['status'] == 'deactivated') {
        echo "<span class='d-flex justify-content-center pb-5'><img width='250' src='https://cdn-icons-png.flaticon.com/512/1437/1437789.png'></span>";
        echo "<h1 class='text-center'>403</h1>";
        echo "<h5 class='text-center'>Your account has been deactivated. <br> If this was an error, please contact the IT Department.</h5>";
    }
    ?>
    
</body>
</html>