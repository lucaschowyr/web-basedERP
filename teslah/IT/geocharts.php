<?php
session_start();
if (!isset($_SESSION['loginUserid'])) {
  header('location:../notloggedin.php');
} else if (isset($_SESSION['loginUserid']) && (isset($_SESSION['dept'])&& $_SESSION['status']=='Active')) {
  $loginUserid = $_SESSION['loginUserid'];
  $employeeName = $_SESSION['employeeName'];
  $jobPosition = $_SESSION['jobPosition'];
  $userDept = $_SESSION['dept'];
} else {
  session_start();
  session_unset();
  session_destroy();
  header("location: ../error.php?status=deactivated");
}
include_once './includes/dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<html>
  <head>
  <title>TeslahSG Pte Ltd</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="" />
  <meta name="keywords" content="">
  <meta name="author" content="Phoenixcoded" />
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
  <link href="dashboard.css" rel="stylesheet">
  <link rel="shortcut icon" href="images/teslah-icon.png">
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
        'packages':['geochart'],
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country', 'Ticket volume'],
          <?php 
         $sql = "SELECT * FROM it"; 
         $fire = mysqli_query ($con,$sql); 
          while ($result = mysqli_fetch_assoc ($fire)){ 
            echo"['" .$result['country']. "',".$result['ticket_id']."],"; 
          } 
        ?> 
        ]);

        var options = {};

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
    </script>
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
                <li class="list-group-item"><a href="auth-normal-sign-in.html"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
              </ul>
            </div>
          </div>

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
              <a href="chart-apex.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Chart</span></a>
            </li>
            <li class="nav-item">
              <a href="geochart.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Maps</span></a>
            </li>
            <li class="nav-item pcoded-menu-caption">
              <label>Pages</label>
            </li>
            </li>
            <li class="nav-item"><a href="sample-page.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Products</span></a></li>
          </ul>

        </div>
      </div>
  </nav>
  <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">


    <div class="m-header">
      <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
      <a href="#!" class="b-brand">
						<img src="images/teslah-logo-mini-white.svg" alt="" class="logo" width="50" height="50">
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
                    <img class="img-radius" src="images/dini20001.png" alt="Generic placeholder image">
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
                    <img class="img-radius" src="images/ivy20003.png" alt="Generic placeholder image">
                    <div class="media-body">
                      <p><strong>Ivy</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>10 min</span></p>
                      <p>Laptop down, need new laptop ASAP</p>
                    </div>
                  </div>
                </li>
                <li class="notification">
                  <div class="media">
                    <img class="img-radius" src="images/sherinna20004.png" alt="Generic placeholder image">
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
                <img src="images/lucas20002.png" class="img-radius" alt="User-Profile-Image">
                <span>
                  <?php
                    echo "<span>".$employeeName."</span>";
                  ?>
                </span>
                <a href="logout.php" class="dud-logout" title="Logout">
                  <i class="feather icon-log-out"></i>
                </a>
              </div>
              <ul class="pro-body">
                <li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                <li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                <li><a href="logout.php" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </div>


  </header>
    <div id="regions_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>

