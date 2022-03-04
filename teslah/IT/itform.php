<?php
session_start();
if (!isset($_SESSION['loginUserid'])) {
  header('location:../error.php?status=notloggedin');
} else if (isset($_SESSION['loginUserid']) && (isset($_SESSION['dept']))&& $_SESSION['status']=='Active') {
  if ($_SESSION['dept'] == 'IT' || $_SESSION['dept'] == 'Management') {
  $loginUserid = $_SESSION['loginUserid'];
  $employeeName = $_SESSION['employeeName'];
  $jobPosition = $_SESSION['jobPosition'];
  $userDept = $_SESSION['dept'];
  $userceo = $_SESSION['dept'];
}else {
  header( 'location:../error.php?status=accessdenied');
}} else {
  session_start();
  session_unset();
  session_destroy();
  header("location: ../error.php?status=deactivated");
}
include_once './includes/dbinsert.php';
?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM it WHERE ticket_id=$id");

		if (count($_GET) == 1 ) {
			$n = mysqli_fetch_array($record);
      $description = $n['description'];
      $priority = $n['priority'];
      $status = $n['status'];
      $dept = $n['dept'];
      $emp_name = $n['emp_name'];
      $emp_id = $n['emp_id'];
      $country = $n['country'];
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>TeslahSG Pte Ltd</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="" />
  <meta name="keywords" content="">
  <meta name="author" content="Phoenixcoded" />
  <link rel="stylesheet" href="../IT/assets/css/style.css">
  <link rel="shortcut icon" href="images/teslah-icon.png">
</head>
<body class="">
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
      <div class="navbar-content scroll-div ">
        <div class="">
          <div class="main-menu-header">
            <div class="user-details">
              <?php
              echo "<img width='50' src='../images/users/" . $loginUserid . ".png' alt='user-img.png'>"
              ?>
            </div>
            <div class="d-flex flex-column user-font m-1">
              <?php
              echo "<span>" . $employeeName . "</span>";
              echo "<span>" . $jobPosition . "</span>";
              echo "<span>" . $userDept . " Department</span>";
              ?>
            </div>
            <div class="collapse" id="nav-user-link">
              <ul class="list-unstyled">
                <li class="list-group-item"><a href="user-profile.html"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
                <li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
                <li class="list-group-item"><a href="../logout.php"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
              </ul>
            </div>
          </div>
          <div class="gap-user"> </div>
          <ul class="nav pcoded-inner-navbar ">
            <li class="nav-item pcoded-menu-caption">
              <label>Navigation</label>
            </li>
            <li class="nav-item">
              <a href="index.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
            </li>
            <li class="nav-item pcoded-menu-caption">
              <label>Forms &amp; table</label>
            </li>
            <li class="nav-item">
              <a href="itform.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Forms</span></a>
            </li>
            <li class="nav-item">
              <a href="table.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Table</span></a>
            </li>
            <li class="nav-item pcoded-menu-caption">
              <label>Chart & Maps</label>
            </li>
            <li class="nav-item">
              <a href="chart.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Chart</span></a>
            </li>
            <li class="nav-item">
              <a href="map.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Maps</span></a>
            </li>
          </ul>
        </div>
      </div>
  </nav>
  <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
    <div class="m-header">
      <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
      <a href="#!" class="b-brand">
						<img src="../images/teslah-logo-mini-white.svg" alt="" class="logo" width="50" height="50">
					</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
          <div class="search-bar">
            <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
            <button type="button" class="close" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li>
          <div class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
            <div class="dropdown-menu dropdown-menu-right notification">
              <div class="noti-head">
                <h6 class="d-inline-block m-b-0">Notifications</h6>
                <div class="float-right">
                  <a href="#!" class="m-r-10">mark as read</a>
                  <a href="#!">clear all</a>
                </div>
              </div>
              <ul class="noti-body">
                <li class="n-title">
                  <p class="m-b-0">NEW</p>
                </li>
                <li class="notification">
                  <div class="media">
                    <img class="img-radius" src="../images/users/dini201.png" alt="Generic placeholder image">
                    <div class="media-body">
                      <p><strong>Dini</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>5 min</span></p>
                      <p>New ticket Added</p>
                    </div>
                  </div>
                </li>
                <li class="n-title">
                  <p class="m-b-0">EARLIER</p>
                </li>
                <li class="notification">
                  <div class="media">
                    <img class="img-radius" src="../images/users/ivy203.png" alt="Generic placeholder image">
                    <div class="media-body">
                      <p><strong>Ivy</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>10 min</span></p>
                      <p>Laptop down, need new laptop ASAP</p>
                    </div>
                  </div>
                </li>
                <li class="notification">
                  <div class="media">
                    <img class="img-radius" src="../images/users/sherinna204.png" alt="Generic placeholder image">
                    <div class="media-body">
                      <p><strong>Sherinna</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>12 min</span></p>
                      <p>currently login</p>
                    </div>
                  </div>
                </li>
              </ul>
              <div class="noti-footer">
                <a href="#!">show all</a>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="dropdown drp-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="feather icon-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-notification">
              <div class="pro-head">
              <?php
              echo "<img width='50' src='../images/users/" . $loginUserid . ".png' alt='user-img.png'>"
              ?>
                <span>
                  <?php
                    echo "<span>".$employeeName."</span>";
                  ?>
                </span>
                <a href="../logout.php" class="dud-logout" title="Logout">
                  <i class="feather icon-log-out"></i>
                </a>
              </div>
              <ul class="pro-body">
                <li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                <li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                <li><a href="../logout.php" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </header>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Enquiry Form</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="itform.php">Enquiry Form</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                    <p class="lead">Please fill in the IT Form below with accurate information.</p>
                    </div>
                    <div class="card-body">
                    <form action="../IT/includes/dbinsert.php" method="POST" class="needs-validation" novalidate>
                      <input type="hidden" name="ticket_id" value="<?php echo $id; ?>">
                        <h4 class="mb-3">Employee Details</h4>
                        <div class="row gy-3">
                          <div class="col-sm-6">
                            <label for="employeeName" class="form-label">Employee Name</label>
                            <input type="text" class="form-control" name="emp_name" placeholder="Enter Name" value="<?php echo $emp_name; ?>" required>
                            <div class="invalid-feedback">
                              Employee Name is required.
                            </div>
                          </div>                        
                          <div class="col-sm-6">
                            <label for="employeeid" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" name="emp_id" placeholder="Enter Employee ID" value="<?php echo $emp_id; ?>" required>
                            <div class="invalid-feedback">
                              Employee's ID is required.
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <label for="department" class="form-label">Department</label>
                            <input type="text" class="form-control" name="dept" placeholder="Enter Department" value="<?php echo $dept; ?>" required>
                            <div class="invalid-feedback">
                              Employee's Department is required.
                            </div>
                          </div>
                          <div class="col-sm-6">
                          <p style="line-height:2em"> </p>
                            <label for="country" class="form-label" >Country</label>
                            <select class="form-select" name="country" value="<?php echo $dept; ?>" required>
                              <option value="" disabled selected hidden>Select</option>
                              <option value="Singapore">Singapore</option>
                              <option value="China">China</option>
                              <option value="Vietnam">Vietnam</option>
                              <option value="USA">USA</option>
                              <option value="Brazil">Brazil</option>
                              <option value="Others">Others</option>
                            </select>
                            <div class="invalid-feedback">
                              Please select country of transaction.
                            </div>
                          </div>
                        </div>
                        <p style="line-height:2em"> </p>
                        <h4 class="col-sm-6">Enquiry Details</h4>
                        <div class="row">
                                            <label for="inputPassword3" class="col-md-1 col-form-label">Priotity</label>
                                            <div class="col-sm-5">
                                                <div class="form-check" >
                                                    <input class="form-check-input" type="radio" name="priority" id="PrioHigh" value="High" checked>
                                                    <label class="form-check-label" for="gridRadios1">High</label>
                                                </div>
                                                <div class="form-check" >
                                                    <input class="form-check-input" type="radio" name="priority" id="PrioLow" value="Low" checked>
                                                    <label class="form-check-label" for="gridRadios1">Low</label>
                                                </div>
                                                <div class="invalid-feedback">
                                                Priority is required.
                                                </div>
                                            </div>
                        </div>
                        <p style="line-height:2em"> </p>
                        <div class="row">
                                            <label for="inputPassword3" class="col-md-1 col-form-label">Status</label>
                                            <div class="col-sm-5">
                                                <div class="form-check" >
                                                    <input class="form-check-input" type="radio" name="status" id="StatusOpen" value="Open" checked>
                                                    <label class="form-check-label" for="gridRadios1">Open</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="StatusClosed" value="Closed" checked>
                                                    <label class="form-check-label" for="gridRadios1">Closed</label>
                                                </div>
                                                <div class="invalid-feedback">
                                                Status is required.
                                                </div>
                                            </div>
                                            <p style="line-height:2em"> </p>
                        </div>
                        <div class="card-header">
                            <label for="customerName" class="form-label" ><strong>Enquiry: </strong></label>
                            <textarea id="Enquiry"  rows="10" cols="10" class="form-control" name="description" placeholder="Enter Enquiry Details" value="<?php echo $description; ?>" required></textarea>
                            <div class="invalid-feedback" >
                            Enquiry detail is required.
                            </div>
                        </div>
                        
                        <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                        </div>       
                        </div>                        
                        <hr class="my-4">
                        <div class="row g-3 p-4 d-flex justify-content-center">
                        <?php if ($update == true): ?>
                        <button class="col-md-4 btn btn-primary btn-lg" type="submit" name="update" style="background: #556B2F;" >update</button>
                        <?php else: ?>
                        <button class="col-md-4 btn btn-primary btn-lg" type="submit" name="save" >Submit Form</button>
                        <!-- <button onclick="window.location.href='itform.php'" class="col-md-4 btn btn-primary btn-lg" type="submit" name="save" >Submit Form</button> -->
                        <?php endif ?>
                        </div>
                      </form>
        <footer class="my-3 text-muted text-center text-small">
            <p id="clock"></p>
            <p class="mb-1">&copy; TeslahSG Pte Ltd</p>
          </footer>
</section>
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/ripple.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
    <script src="form-validation.js"></script>
    <script type="text/javascript">
          var clockElement = document.getElementById('clock');
          function clock() {
              var date = new Date();            
              if (window.matchMedia('(max-width: 400px)').matches) {                
                  clockElement.textContent = date.toLocaleString();
              } else {
                  clockElement.textContent = date.toString();
              }
          }
          setInterval(clock, 1000);
    </script>
</body>
</html>
