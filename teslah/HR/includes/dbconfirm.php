<?php

session_start();   

if (!isset($_SESSION['loginUserid'])) {

  header('location:../notloggedin.php');

} else if (isset($_SESSION['loginUserid']) && (isset($_SESSION['dept']))) {

  if ($_SESSION['dept'] == 'HR' || $_SESSION['dept'] == 'Management') {
  
  $loginUserid = $_SESSION['loginUserid'];
  $employeeName = $_SESSION['employeeName'];
  $jobPosition = $_SESSION['jobPosition'];
  $userDept = $_SESSION['dept'];
  
  }
  else {
    header( 'location:../error.php?status=accessdenied');
  }
  
} else {

  session_start();
  session_unset();
  session_destroy();
  header("location: ../login.php?status=error");

}

  include_once '../../includes/dbconnect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>TeslahSG Pte Ltd</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>    

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <div class="navbar-brand col-md-3 col-lg-2 me-0 px-3">
    <span><img class="bg-white navbar-brand py-0" src="../images/teslah-logo-mini-white.svg" width="30" alt=""></span>
    <a class="navbar-dark navbar-brand" href="#">TeslahSG</a>
  </div>
  
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark" type="search" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-4" href="../logout.php">Logout</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">

        <div class="nav inline-flex px-3 p-4">
          <div class="nav-profile-image mx-1">
            <?php
            
            echo "<img width='50' src='../../images/users/".$loginUserid.".png' alt='user-img.png'>"
            
            ?>
          </div>
          <div class="d-flex flex-column user-font m-1">
          
          <?php

          echo "<span>".$employeeName."</span>";
          echo "<span>".$jobPosition."</span>";
          echo "<span>".$userDept." Department</span>";
          
          ?>
          
          </div>
        </div>

        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
              <span data-feather="layers"></span>
              User Registration Form
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="update_delete.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
              <span data-feather="cart"></span>
              Update / Delete User
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="search_rpt.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
              <span data-feather="file"></span>
              Enquiry
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="charts.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
              <span data-feather="bar-chart-2"></span>
              Charts
            </a>
          </li> -->
          
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">List of Employees</h1>
        </div> 

        <?php
        if (!empty($_POST['emp_id']) && $_POST['action'] == 'Update') {
            
            echo 
            "<form action='dbupdate.php' method='POST'>
            <div class='alert alert-warning' role='alert'>
            Are you sure you want to permanently update the following record(s) from the database?
            </div>
            <div class='table-responsive py-3'>";
            
        } else if (!empty($_POST['emp_id']) && $_POST['action'] == 'Delete') {
            
            echo
            "<form action='dbdelete.php' method='POST'>
            <div class='alert alert-danger' role='alert'>
            Are you sure you want to permanently update the following record(s) from the database?
            </div>
            <div class='table-responsive py-3'>";

        }
        ?>

      
        
        <?php

            if ($_POST['action'] == 'Update') {

                if(!empty($_POST['emp_id'])) {

                    echo "<table class='table table-striped table-sm'>";
                    echo "<thead><tr><th scope='col'>" . 'Select'
                    . "<th scope='col'>" . 'Emp ID'
                    . "</th><th scope='col'>" . 'Employee Name'
                    . "</th><th scope='col'>" . 'User ID'
                    . "</th><th scope='col'>" . 'User Password'
                    . "</th><th scope='col'>" . 'Department'
                    . "</th><th scope='col'>" . 'Country'
                    . "</th><th scope='col'>" . 'Job Position'
                    . "</th><th scope='col'>" . 'Date Join'
                    . "</th><th scope='col'>" . 'Gender'
                    . "</th><th scope='col'>" . 'Status'
                    . "</th><th scope='col'>" . 'Authority'
                    . "</th></tr></thead>";
                    echo "<tbody>";

                    // print options function

                    function printOptions($item, $option) { //$row['product'], Car
                        echo "<option value='".$option."'";
                        if ($item == $option) {
                            echo "selected";
                        }
                        echo ">".$option."</option>'";
                    };

                    foreach($_POST['emp_id'] as $selectedID) {
                    $sql = "SELECT * FROM emp_info WHERE emp_id=$selectedID;";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck >0){                        
                            
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                
                                echo "<tr><td><input type='checkbox' name='emp_id[]' value='". $row['emp_id']."' checked>"
                                . "</td><td>" . $row['emp_id'] 
                                . "</td><td>" . "<input class='col-sm-12' type='text' name='femp_name[]' value='" . $row['emp_name'] . "'required>"
                                . "</td><td>" . "<input class='col-sm-12 hidden' type='text' name='fuser_id[]' value='" . $row['user_id'] . "'required>"
                                . "</td><td>" . "<input class='col-sm-12 hidden' type='text' name='fuser_pwd[]' value='" . $row['user_pwd'] . "'required>"
                                . "</td><td>"
                                . "<select name='fdept[]' required>";
                                printOptions($row['dept'], 'HR');
                                printOptions($row['dept'], 'IT');
                                printOptions($row['dept'], 'Logistics');
                                printOptions($row['dept'], 'Management');
                                printOptions($row['dept'], 'Sales');
                                echo "</select>"
                                . "</td><td>"
                                ."<select name='fcountry[]' required>";
                                printOptions($row['country'], 'Singapore');
                                printOptions($row['country'], 'China');
                                printOptions($row['country'], 'Vietnam');
                                printOptions($row['country'], 'Others');
                                echo "</select>"
                                . "</td><td>" . "<input class='col-sm-12' type='text' name='fjob_position[]' value='" . $row['job_position'] . "'required>"
                                . "</td><td>" . "<input class='col-sm-12' type='text' name='fappt_date[]' value='" . $row['appt_date'] . "'required>"
                                . "</td><td>" . "<input class='col-sm-12' type='text' name='fgender[]' value='" . $row['gender'] . "'required>"
                                . "</td><td>" 
                                . "<select name='fstatus[]' required>";
                                printOptions($row['status'], 'Active');
                                printOptions($row['status'], 'Resign');
                                echo "</select>"
                                . "</td><td>" 
                                ."<select name='fauth[]' required>";
                                printOptions($row['auth'], 'Admin');
                                printOptions($row['auth'], 'User');
                                echo "</select>"
                                . "</td></tr>";
                              
                            };

                        } else {
                        echo "0 results";
                        }

                    } echo "</tbody></table>";
                } else {
                    echo
                    "<div class='alert alert-secondary' role='alert'>
                    No data was selected.
                    </div>
                    <div class='table-responsive py-3'>";
            }


            
            } else if ($_POST['action'] == 'Delete') {

                if(!empty($_POST['emp_id'])) {

                    echo "<table class='table table-striped table-sm'>";
                    echo "<thead><tr><th scope='col'>" . 'Select'
                    . "</th><th scope='col'>" . 'Employee ID'
                    . "</th><th scope='col'>" . 'Employee Name'
                    . "</th><th scope='col'>" . 'User ID'
                    . "</th><th scope='col'>" . 'User Password'
                    . "</th><th scope='col'>" . 'Department'
                    . "</th><th scope='col'>" . 'Country'
                    . "</th><th scope='col'>" . 'Job Position'
                    . "</th><th scope='col'>" . 'Date Join'
                    . "</th><th scope='col'>" . 'Gender'
                    . "</th><th scope='col'>" . 'Status'
                    . "</th><th scope='col'>" . 'Authority'
                            . "</th></tr></thead>";
                    echo "<tbody>";

                    foreach($_POST['emp_id'] as $selectedID) {
                    $sql = "SELECT * FROM emp_info WHERE emp_id=$selectedID;";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck >0){
                        
                        while ($row = mysqli_fetch_assoc($result))
                        {
                            echo "<tr><td><input type='checkbox' name='emp_id[]' value='". $row['emp_id']."' checked>"
                            . "</td><td>" . $row['emp_id'] 
                            . "</td><td>" . $row['emp_name']
                            . "</td><td>" . $row['user_id'] 
                            . "</td><td>" . $row['user_pwd']
                            . "</td><td>" . $row['dept']
                            . "</td><td>" . $row['country']
                            . "</td><td>" . $row['job_position']
                            . "</td><td>" . $row['appt_date']
                            . "</td><td>" . $row['gender']
                            . "</td><td>" . $row['status']
                            . "</td><td>" . $row['auth']
                            . "</td></tr>";
                        };

                        } else {
                        echo "0 results";
                        }

                    } echo "</tbody></table>";
                } else {
                    echo
                    "<div class='alert alert-secondary' role='alert'>
                    No data was selected.
                    </div>
                    <div class='table-responsive py-3'>";
                }

            }

        ?>

        </div>

        <div class="text-center">
            
          <?php
            if (!empty($_POST['emp_id']) && $_POST['action'] == 'Update') {

            echo
            "<button type='button' class='btn btn-secondary mx-2'>
            <a href='../update_delete.php' style='all:unset'>Cancel</a>
            </button>
            <button type='submit' class='btn btn-warning'>Confirm Update</button>";

            } else if (!empty($_POST['emp_id']) && $_POST['action'] == 'Delete') {

            echo
            "<button type='button' class='btn btn-secondary mx-2'>
            <a href='../update_delete.php' style='all:unset'>Cancel</a>
            </button>
            <button type='submit' class='btn btn-danger'>Confirm Delete</button>";

            } else {
            
              echo
            "<button type='button' class='btn btn-primary mx-2'>
            <a href='../update_delete.php' style='all:unset'>Go Back</a>
            </button>";
            
            }
          ?>
        
      </div>

    </form>

      


    </main>
  </div>
</div>

    
  </body>
</html>
