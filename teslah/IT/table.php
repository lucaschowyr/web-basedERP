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
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
</head>
<body class="">
  <?php if (isset($_SESSION['message'])): ?>
	<div class="msg"></div>
	<?php 
			echo $_SERVER['message']; 
			unset($_SESSION['message']);
	?>
  <?php endif ?>
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
              if ($userceo=='Management') {
                echo "<a href='../Management/index.php' value='management-index'>Management Page</a>";
              }
              else {
                echo "";
              }
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
            <?php 
                if ($userDept=='IT') {
                  echo "<a href='../IT/itform.php' class='nav-link'><span class='pcoded-micon'><i class='feather icon-file-text'></i></span><span class='pcoded-mtext'>Forms</span></a>";
                  }
                  else {
                    echo "";
                  }
              ?>
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
                            <h5 class="m-b-10">Tables</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="table.php">Tables</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Enquiry Table</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    <?php $results = mysqli_query($db, "SELECT * FROM it"); ?>
            <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Ticket ID</th>
                        <th>Date & Time</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Employee Name</th>
                        <th>Employee ID</th>
                        <th>Description</th>
                        <th>Country</th>
                        <th>Update/Delete</th>
                    </tr>
                </thead>
                <?php while ($row = mysqli_fetch_array($results)) { 
                ?>
                <tr>
                    <td><?php echo $row['ticket_id']; ?></td>
                    <td><?php echo $row['time']; ?></td>
                    <td><?php echo $row['priority']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['emp_id']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['country']; ?></td>
                    <td>
                    <a href="itform.php?edit=<?php echo $row['ticket_id']; ?>" class="btn btn-info">Update</a>
                    <a href="table.php?del=<?php echo $row['ticket_id']; ?>" button onclick="alert()" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    </div>
    </div>
    <hr class="my-4">
      <footer class="my-3 text-muted text-center text-small">
        <p id="clock"></p>
        <p class="mb-1">&copy; TeslahSG Pte Ltd</p>
      </footer>
    </div>
    </section>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>   
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/ripple.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
  </body>
</html>
