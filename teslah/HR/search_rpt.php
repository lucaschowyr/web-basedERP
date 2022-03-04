<?php

session_start();   //this statement is needed if you wish to pass session variables passed to this file

if (!isset($_SESSION['loginUserid'])) {

  header('location:../error.php?status=notloggedin');

} else if (isset($_SESSION['loginUserid']) && (isset($_SESSION['dept']))) {

  if ($_SESSION['dept'] == 'Management' || $_SESSION['dept'] == 'HR') {

    $loginUserid = $_SESSION['loginUserid'];
    $employeeName = $_SESSION['employeeName'];
    $jobPosition = $_SESSION['jobPosition'];
    $userDept = $_SESSION['dept'];
    $userAuth = $_SESSION['auth'];
  
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

  include_once '../includes/dbconnect.php';
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

      tr:nth-child(even) {
      background-color: #D6EEEE;
      }

    </style>


    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
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
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-4" href="../logout.php">Logout</a>
    </div>
  </div>
</header>


<!-- Left Menu -->
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <div class="nav inline-flex px-3 p-4">
          <div class="nav-profile-image mx-1">
            <?php
            
            echo "<img width='50' src='../images/users/".$loginUserid.".png' alt='user-img.png'>"
            
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
            <a class="nav-link pr-2" aria-current="page" href="index.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <?php if ($userAuth=='Admin'): ?>
          <li class="nav-item">
            <a class="nav-link" href="register.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
              <span data-feather="file"></span>
              User Registration Form
            </a>
          <li class="nav-item">
            <a class="nav-link" href="update_delete.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
              <span data-feather="file"></span>
              Update / Delete User
            </a>
          </li>
          <?php endif ?>
          <li class="nav-item">
            <a class="nav-link active" href="search_rpt.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
              <span data-feather="bar-chart-2"></span>
              Enquiry
            </a>
          </li>
          <?php
          if ($userDept=='Management') {
              echo "
                <button class='text-start btn btn-block btn-outline-secondary' ><a style='all:unset' href='../management/index.php'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='20' height='16' viewBox='0 0 20 16' fill='currentColor' class='bi bi-arrow-left-circle-fill'>
                    <path d='M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z'/>
                  </svg>
                  Management
                </a></button>
              ";
          }
          ?>
        </ul>
        </div>
      </nav>
      </div>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
      <h3>Enquiry</h3>
      </div>

    <body>

      <div class="row">
        <div class="col-md-6">
          <form action="search_rpt.php" method="POST"> 
          <table class='table table-striped table-sm'>
          <div class="HR Group">
            <h4>HR Department</h4><p>
            <input type="" class="form-control" name="emp_id" placeholder="Enter Employee ID" value="" required>	
          </div>
          <div class="col-sm-6 "> 
            <button type="submit" name="searchID" class="btn btn-success btn-lg">Search</button>
          </div>
          </table>
          </form>
        </div>
      </div>
      

    <!-- Table for HR --> 
    <div class="table-responsive">
    <table class='table table-striped table-sm'>
      <thread>
        <tr>
          <th scope='col'>Emp ID
          <th scope='col'>Employee Name
          <th scope='col'>Department
          <th scope='col'>Country
          <th scope='col'>Job Position
          <th scope='col'>Status
        </tr>
      </thread>
    <tbody>
    <?php
      if(isset($_POST['searchID']))
      {
        $emp_id = $_POST['emp_id'];
        $query = "SELECT * FROM emp_info where emp_id='$emp_id'";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run)>0)
        {
          while($row=mysqli_fetch_array($query_run))
          {
    ?>
        <tr>
          <td><?php echo $row['emp_id'];?></td>
          <td><?php echo $row['emp_name'];?></td>
          <td><?php echo $row['dept'];?></td>
          <td><?php echo $row['country'];?></td>
          <td><?php echo $row['job_position'];?></td>
          <td><?php echo $row['status'];?></td>
        </tr>
      <?php     
          }
        } 
        else
        {
      ?>
        <tr>
          <td colspan="6">No Record Found</td>
        <?php
        }
      }
      ?>
    </tbody>
    </table>
    </div>
    </body>
    <br>
 

    <body>
  <div class="row">
    <div class="col-md-6">
    <form action="search_rpt.php" method="POST"> 
    <table class='table table-striped table-sm'>
      <div class="IT Grp">
      <h4>Sales Department</h4><p>
        <input type="" class="form-control" name="emp_id" placeholder="Enter Employee ID" value="" required>	
      </div>
      <div class="col-sm-6 "> 
        <button type="submit" name="SalesSearchID" class="btn btn-success btn-lg">Search</button>
      </div>
    </table>
    </form>
    </div> 
  </div>

  <!-- Table for Sales -->   
  <div class="table-responsive">
    <table class='table table-striped table-sm'>
      <thread>
        <tr>
        <th scope='col'>Emp ID</th>
        <th scope='col'>Salesperson</th>
        <th scope='col'>Transaction ID</th>
        <th scope='col'>Date</th>
        <th scope='col'>Customer</th>
        <th scope='col'>Product</th>
        <th scope='col'>Model</th>
        <th scope='col'>Qty</th>
        </tr>
      </thread>
    <tbody>
    <?php
      if(isset($_POST['SalesSearchID']))
      
      {
        $employee_id = $_POST['emp_id'];
        $query = "SELECT * FROM sales where employee_id='$employee_id'";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run)>0)
        {
          while($row=mysqli_fetch_array($query_run))
          {
    ?>
        <tr>
        <td><?php echo $row['employee_id'];?></td>
        <td><?php echo $row['salesperson_name'];?></td>
        <td><?php echo $row['transaction_id'];?></td>
        <td><?php echo $row['date'];?></td>
        <td><?php echo $row['customer_name'];?></td>
        <td><?php echo $row['product'];?></td>
        <td><?php echo $row['model'];?></td>
        <td><?php echo $row['qty'];?></td>
        </tr>
      <?php     
          }
        } 
        else
        {
      ?>
        <tr>
          <td colspan="9">No Record Found</td>
        <?php
        }
      }
      ?>
  </tbody>
    </table>
    </div>
    </body>
    <br>

  <div class="row">
        <div class="col-md-6">
          <form action="search_rpt.php" method="POST"> 
          <table class='table table-striped table-sm'>
          <div class="HR Group">
            <h4>IT Department</h4><p>
            <input type="" class="form-control" name="emp_id" placeholder="Enter Employee ID" value="" required>	
          </div>
          <div class="col-sm-6 "> 
            <button type="submit" name="ITsearchID" class="btn btn-success btn-lg">Search</button>
          </div>
          </table>
          </form>
        </div>
      </div>

  <!-- Table for IT -->   
  <div class="table-responsive">
    <table class='table table-striped table-sm'>
      <thread>
        <tr>
        <th scope='col'>Emp ID
          <th scope='col'>Employee Name
          <th scope='col'>Department
          <th scope='col'>Ticket ID
          <th scope='col'>Description
          <th scope='col'>Priority
          <th scope='col'>Status
        </tr>
      </thread>
    <tbody>
    <?php
      if(isset($_POST['ITsearchID']))
      
      {
        $emp_id = $_POST['emp_id'];
        $query = "SELECT * FROM it where emp_id='$emp_id'";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run)>0)
        {
          while($row=mysqli_fetch_array($query_run))
          {
    ?>
        <tr>
        <td><?php echo $row['emp_id'];?></td>
          <td><?php echo $row['emp_name'];?></td>
          <td><?php echo $row['dept'];?></td>          
          <td><?php echo $row['ticket_id'];?></td>
          <td><?php echo $row['description'];?></td>
          <td><?php echo $row['priority'];?></td>
          <td><?php echo $row['status'];?></td>
        </tr>
      <?php     
          }
        } 
        else
        {
      ?>
        <tr>
          <td colspan="7">No Record Found</td>
        <?php
        }
      }
      ?>
    </tbody>
    </table>
  </div>
  </body>

  <footer class="my-3 text-muted text-center text-small">
            <p id="clock"></p>
            <p class="mb-1">&copy; TeslahSG Pte Ltd</p>
  </footer>  

  </main>
  
  
  </div>
</div>


</html>