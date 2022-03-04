<?php
if (isset($_POST['login-submit'])) {

    require 'dbconnect.php';

    $username = $_POST['loginUserid'];
    $password = $_POST['loginPwd'];
    
    if (empty($username) || empty($password)) {

        // echo "Login unsuccessful, please try again.";
        // echo "<br><a href='../login.php'>Go back</a> to login.";
        header("Location: ../login.php?error=emptyfields");
        exit();

    } else {

        $sql = "SELECT * FROM emp_info WHERE user_id=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {

            // echo "Login unsuccessful, please try again.";
            // echo "<br><a href='../login.php'>Go back</a> to login.";
            header("Location: ../login.php?error=sqlerror");
            exit();

        } else {

            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if ($row = mysqli_fetch_assoc($result)) {
                
                    if ($password != $row['user_pwd']) {

                    // echo "Wrong password, please try again.";
                    // echo "<br><a href='../login.php'>Go back</a> to login.";
                    header("Location: ../login.php?error=wrongpwd");
                    exit();

                    } else if ($password == $row['user_pwd']){
                        
                        //print_r($row);
                        session_start();
                        $_SESSION['loginUserid'] = $row['user_id'];
                        $_SESSION['employeeName'] = $row['emp_name'];
                        $_SESSION['jobPosition'] = $row['job_position'];
                        $_SESSION['dept'] = $row['dept'];
                        $_SESSION['status'] = $row['status'];
                        $_SESSION['auth'] = $row['auth'];

                        if ($_SESSION['dept'] == 'HR') {
                            header("Location: ../HR/index.php");
                        } else if ($_SESSION['dept'] == 'Sales'){
                            header("Location: ../sales/index.php");
                        } else if ($_SESSION['dept'] == 'IT'){
                            header("Location: ../IT/index.php");
                        } else if ($_SESSION['dept'] == 'Logistics'){
                            header("Location: ../logistics/index.php");
                        } else if ($_SESSION['dept'] == 'Management'){
                            header("Location: ../management/index.php");
                        } else {
                            echo "User's department is unknown. Please contact the HR department.";
                        }
                    
                        // header("Location: ../login.php?login=success");
                
                    } else {
                    
                        // echo "Wrong password, please try again.";
                        // echo "<br><a href='../login.php'>Go back</a> to login.";
                        header("Location: ../login.php?error=wrongpwd");
                        
                        exit();
                    }

            } else {
                // echo "No such user registered, please try again.";
                // echo "<br><a href='../login.php'>Go back</a> to login.";
                header("Location: ../login.php?error=nouser");
                exit();
            };
        };
    };

} else {
    header("Location: ../login.php?error=connectionerror");
}

?>