<?php

session_start();   

if (!isset($_SESSION['loginUserid'])) {

  header('location:../error.php?status=notloggedin');

} else if (isset($_SESSION['loginUserid']) && (isset($_SESSION['dept'])) && $_SESSION['status']=='Active') {

  if ($_SESSION['dept'] == 'Management' || $_SESSION['dept'] == 'HR') {

  $loginUserid = $_SESSION['loginUserid'];
  $employeeName = $_SESSION['employeeName'];
  $jobPosition = $_SESSION['jobPosition'];
  $userDept = $_SESSION['dept'];
  $userAuth = $_SESSION['auth'];
  $userStatus = $_SESSION['status'];
  
  }
  else {
    header('location:../error.php?status=accessdenied');
  }
  
} else {

  session_start();
  session_unset();
  session_destroy();
  header('location:../error.php?status=deactivated');

}

  include_once '../includes/dbconnect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TeslahSG Pte Ltd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/dashboard.css" rel="stylesheet">
  </head>



  <body>
    
    <!-- Top Nav     -->
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
            <a class="nav-link" aria-current="page" href="index.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <?php if ($userAuth=='Admin'): ?>
          <li class="nav-item">
            <a class="nav-link active" href="register.php">
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

    <!-- Sales Form -->
    <div class="container">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5">
          <div class="pt-5 pb-0 text-center">
            <!-- <img class="d-block mx-auto mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
            <h2>User Registration Form</h2>
            <p class="lead">Please fill in the User Registration Form below with accurate information.</p>

            <?php
            if (isset($_GET['Entries']) && $_GET['Entries']=='Successful')
            {
              echo "<div class='text-start alert alert-success' role='alert'> User Registration Form was successfully submitted!</div>";
            } else if (isset($_GET['Entries']) && $_GET['Entries']=='Error') {
              echo "<div class='text-start alert alert-danger' role='alert'> There was an error with your form submission. Please check!</div>";
            }
            ?>
          </div>
              
          <form action="includes/dbinsert.php" method="POST" class="needs-validation" novalidate>
                        
            <hr class="mb-4">
              <div class="row gy-2">		
                <div class="col-sm-6">
                  <label for="emp_id" class="form-label"><strong>Employee ID: </strong></label>
                  <input type="number" class="form-control" name="femp_id" placeholder="Enter ID" value="" required>  
                  <div class="invalid-feedback">
                    Employee ID is required.
                  </div>   
                </div>

                <div class="col-sm-6">
                  <label for="emp_name" class="form-label"><strong>Employee Name: </strong></label>
                  <input type="text" class="form-control" name="femp_name" placeholder="Enter Name" value="" required>
                  <div class="invalid-feedback">
                    Employee Name is required.
                  </div>
                </div>

              <div class="col-sm-6"> 
                <label for="gender" class="form-label"><strong>Gender: </strong></label>
                <select class="form-control" name="fgender" required>
                <option value="" disabled selected hidden>Gender</option>
                <option value="Female">Female</option>
                <option value="Male">Male</option>
                </select>
                <div class="invalid-feedback">
                  Please select accordingly.
                </div>
              </div>
            
              <div class="col-sm-6">
                <label for="status"><strong>Status: </strong></label>
                <select class="form-control" name="fstatus" required>
                <option value="" disabled selected hidden>Status</option>
                <option value="Active">Active</option>
                <option value="Resign">Resign</option>
                </select>
                <div class="invalid-feedback">
                  Please select accordingly.
                </div>
              </div>		
            
              <div class="col-sm-6"> 
                <label for="dept"><strong>Department: </strong></label>
                <select class="form-control" name="fdept" required>
                <option value="" disabled selected hidden>Department</option>
                <option value="HR">HR</option>
                <option value="IT">IT</option>
                <option value="Logistics">Logistics</option>
                <option value="HR">Management</option>
                <option value="Sales">Sales</option>
                </select>	
                <div class="invalid-feedback">
                  Please select accordingly.
                </div>
              </div>

              <div class="col-sm-6"> 		
                <label for="country"><strong>Country: </strong></label>
                <select class="form-control" name="fcountry" required>
                <option value="" disabled selected hidden>Country</option>
                <option value="China">China</option>
                <option value="Singapore">Singapore</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Others">Others</option>
                </select>
                <div class="invalid-feedback">
                  Please select accordingly.
                </div>
              </div>
                  
              <div class="col-sm-6"> 	
                <label for="user_id" class="form-label"><strong>User ID: </strong></label>
                <input type="" class="form-control" name="fuser_id" placeholder="Enter User ID" value="" required>		
                <div class="invalid-feedback">
                  User ID is required.
                </div>
              </div>

              <div class="col-sm-6"> 	
                <label for="user_pwd" class="form-label"><strong>User Password: </strong></label>
                <input type="text" class="form-control" name="fuser_pwd" placeholder="Enter User Password" value="" required>	
                <div class="invalid-feedback">
                  User Password is required.
                </div>	
              </div>

              <div class="col-sm-6"> 				
                <label for="appt_date" class="form-label"><strong>Date Join: </strong></label>
                <input type="date" class="form-control" name="fappt_date" placeholder="Enter Date" value="" required>			
                <div class="invalid-feedback">
                  Date is required.
                </div>
              </div>

              <div class="col-sm-6"> 	
                <label for="job_position" class="form-label"><strong>Job Position: </strong></label>
                <input type="text" class="form-control" name="fjob_position" placeholder="Enter Job Position" value=""required>		
                <div class="invalid-feedback">
                  Job Position is required.
                </div>
              </div>

              <div class="col-sm-6"> 	
                <label for="auth"><strong>User Authorisation: </strong></label><br>
                <input type="radio" id="user" name="fauth" value="User"> 
                <label for="user">User</label><br>
                <input type="radio" id="admin" name="fauth" value="Admin">
                <label for="admin">Admin</label><p>
                <div class="invalid-feedback">
                  Please select accordingly.
                </div>
              </div>

              <!-- <div class="row d-flex justify-content-center"> -->

              <div class="col-sm-6 "> 
                <input type="reset" class="btn btn-outline-primary btn-lg" value="Clear Form">
                <input type="submit" class="btn btn-success btn-lg" value="Register">
              </div>

              </div>

          
          </form>

        
          <footer class="my-3 text-muted text-center text-small">
            <p id="clock"></p>
            <p class="mb-1">&copy; TeslahSG Pte Ltd</p>
          </footer>  

        </main>
      
        
      
      
    </div>        
      <script src="js/form-validation.js"></script>
      <script type="text/javascript">
          var clockElement = document.getElementById('clock');

          function clock() {
              var date = new Date();

              // Replace '400px' below with where you want the format to change.
              if (window.matchMedia('(max-width: 400px)').matches) {
                  // Use this format for windows with a width up to the value above.
                  clockElement.textContent = date.toLocaleString();
              } else {
                  // While this format will be used for larger windows.
                  clockElement.textContent = date.toString();
              }
          }

          setInterval(clock, 1000);
      </script>

      
  </body>
</html>
