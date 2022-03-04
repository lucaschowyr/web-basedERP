<?php
session_start();
if (!isset($_SESSION['loginUserid'])) {
  header('location:../error.php?status=notloggedin');
} else if (isset($_SESSION['loginUserid']) && (isset($_SESSION['dept']))&& $_SESSION['status']=='Active') {
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
include_once '../includes/dbconnect.php';
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
  <link rel="stylesheet" href="../Management/assets/css/style.css">
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
              echo "<a href=\"index.php\"><img width='50' src='../images/users/" . $loginUserid . ".png' alt='user-img.png'>";
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
              <label>Department</label>
            </li>
            <li class="nav-item">
              <a href="../IT/index.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-cloud"></i></span><span class="pcoded-mtext">IT</span></a>
            </li>
            <li class="nav-item">
              <a href="../sales/index.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-activity"></i></span><span class="pcoded-mtext">Sales</span></a>
            </li>
            <li class="nav-item">
              <a href="../HR/index.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file"></i></span><span class="pcoded-mtext">HR</span></a>
            </li>
          </ul>

          <!-- <ul class="nav pcoded-inner-navbar ">
            <li class="nav-item pcoded-menu-caption">
              <label>Tables</label>
            </li>
            <li class="nav-item">
              <a href="./tables.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-grid"></i></span><span class="pcoded-mtext">Summary</span></a>
            </li>
          </ul> -->
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
                    <img class="img-radius" src="../images/users/lucas202.png" alt="Generic placeholder image">
                    <div class="media-body">
                      <p><strong>Lucas</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>5 min</span></p>
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
                <img src="../images/users/raphael101.png" class="img-radius" alt="User-Profile-Image">
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
  <div class="pcoded-main-container">
    <div class="pcoded-content">
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h5 class="m-b-10">CEO Dashboard</h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="index.php">CEO Dashboard</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-7 col-md-12">
          <div class="row">
            <div class="col-sm-6">
              <div class="card support-bar overflow-hidden">
                <div class="card-body pb-0">
                  <h2 class="m-0">350</h2>
                  <span class="text-c-blue">Support Requests</span>
                  <p class="mb-3 mt-3">Total number of support requests.</p>
                </div>
                <div id="support-chart"></div>
                <div class="card-footer bg-primary text-white">
                  <div class="row text-center">
                    <div class="col">
                      <h4 class="m-0 text-white">35</h4>
                      <span>Open</span>
                    </div>
                    <div class="col">
                      <h4 class="m-0 text-white">15</h4>
                      <span>Pending</span>
                    </div>
                    <div class="col">
                      <h4 class="m-0 text-white">300</h4>
                      <span>Solved</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card support-bar overflow-hidden">
                <div class="card-body pb-0">
                  <h2 class="m-0">183</h2>
                  <span class="text-c-green">Priority Level</span>
                  <p class="mb-3 mt-3">Total number of priority requests.</p>
                </div>
                <div id="support-chart1"></div>
                <div class="card-footer bg-success text-white">
                  <div class="row text-center">
                    <div class="col">
                      <h4 class="m-0 text-white">26</h4>
                      <span>High</span>
                    </div>
                    <div class="col">
                      <h4 class="m-0 text-white">7</h4>
                      <span>Low</span>
                    </div>
                    <div class="col">
                      <h4 class="m-0 text-white">150</h4>
                      <span>Solved</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-md-12">
          <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h4 class="text-c-yellow">SGD 300,200</h4>
                      <h6 class="text-muted m-b-0">Budget balance</h6>
                    </div>
                    <div class="col-4 text-right">
                      <i class="feather icon-bar-chart-2 f-28"></i>
                    </div>
                  </div>
                </div>
                <div class="card-footer bg-c-yellow">
                  <div class="row align-items-center">
                    <div class="col-9">
                      <p class="text-white m-b-0">% change</p>
                    </div>
                    <div class="col-3 text-right">
                      <i class="feather icon-trending-up text-white f-16"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h4 class="text-c-green">290+</h4>
                      <h6 class="text-muted m-b-0">Page Views</h6>
                    </div>
                    <div class="col-4 text-right">
                      <i class="feather icon-file-text f-28"></i>
                    </div>
                  </div>
                </div>
                <div class="card-footer bg-c-green">
                  <div class="row align-items-center">
                    <div class="col-9">
                      <p class="text-white m-b-0">% change</p>
                    </div>
                    <div class="col-3 text-right">
                      <i class="feather icon-trending-up text-white f-16"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h4 class="text-c-red">145</h4>
                      <h6 class="text-muted m-b-0">Task</h6>
                    </div>
                    <div class="col-4 text-right">
                      <i class="feather icon-calendar f-28"></i>
                    </div>
                  </div>
                </div>
                <div class="card-footer bg-c-red">
                  <div class="row align-items-center">
                    <div class="col-9">
                      <p class="text-white m-b-0">% change</p>
                    </div>
                    <div class="col-3 text-right">
                      <i class="feather icon-trending-down text-white f-16"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h4 class="text-c-blue">5001</h4>
                      <h6 class="text-muted m-b-0"> Brouchure Downloads</h6>
                    </div>
                    <div class="col-4 text-right">
                      <i class="feather icon-thumbs-down f-28"></i>
                    </div>
                  </div>
                </div>
                <div class="card-footer bg-c-blue">
                  <div class="row align-items-center">
                    <div class="col-9">
                      <p class="text-white m-b-0">% change</p>
                    </div>
                    <div class="col-3 text-right">
                      <i class="feather icon-trending-down text-white f-16"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-md-12">
          <div class="card table-card">
            <div class="card-header">
              <h5>Projects</h5>
              <div class="card-header-right">
                <div class="btn-group card-option">
                  <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="feather icon-more-horizontal"></i>
                  </button>
                  <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-hover mb-0">
                  <thead>
                    <tr>
                      <th>
                        <div class="chk-option">
                          <label class="check-task custom-control custom-checkbox d-flex justify-content-center done-task">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-label"></span>
                          </label>
                        </div>
                        Assigned
                      </th>
                      <th>Name</th>
                      <th>Due Date</th>
                      <th class="text-right">Priority</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="chk-option">
                          <label class="check-task custom-control custom-checkbox d-flex justify-content-center done-task">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-label"></span>
                          </label>
                        </div>
                        <div class="d-inline-block align-middle">
                          <img src="../images/users/dini201.png" alt="user image" class="img-radius wid-40 align-top m-r-15">
                          <div class="d-inline-block">
                            <h6>Dini</h6>
                            <p class="text-muted m-b-0">Sales Manager</p>
                          </div>
                        </div>
                      </td>
                      <td>
                      <?php
                        echo "<span>".$employeeName."</span>";
                      ?>
                      </td>
                      <td>14 Feb 2022</td>
                      <td class="text-right"><label class="badge badge-light-danger">High</label></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="chk-option">
                          <label class="check-task custom-control custom-checkbox d-flex justify-content-center done-task">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-label"></span>
                          </label>
                        </div>
                        <div class="d-inline-block align-middle">
                          <img src="../images/users/ivy203.png" alt="user image" class="img-radius wid-40 align-top m-r-15">
                          <div class="d-inline-block">
                            <h6>Ivy</h6>
                            <p class="text-muted m-b-0">Logistic Manager</p>
                          </div>
                        </div>
                      </td>
                      <td>Sham</td>
                      <td>15 Feb 2022</td>
                      <td class="text-right"><label class="badge badge-light-primary">low</label></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="chk-option">
                          <label class="check-task custom-control custom-checkbox d-flex justify-content-center done-task">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-label"></span>
                          </label>
                        </div>
                        <div class="d-inline-block align-middle">
                          <img src="../images/users/sherinna204.png" alt="user image" class="img-radius wid-40 align-top m-r-15">
                          <div class="d-inline-block">
                            <h6>Sherinna</h6>
                            <p class="text-muted m-b-0">HR</p>
                          </div>
                        </div>
                      </td>
                      <td>Eddie</td>
                      <td>16 Feb 2022</td>
                      <td class="text-right"><label class="badge badge-light-success">medium</label></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="chk-option">
                          <label class="check-task custom-control custom-checkbox d-flex justify-content-center done-task">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-label"></span>
                          </label>
                        </div>
                        <div class="d-inline-block align-middle">
                          <img src="../images/users/lucas202.png" alt="user image" class="img-radius wid-40 align-top m-r-15">
                          <div class="d-inline-block">
                            <h6>Lucas</h6>
                            <p class="text-muted m-b-0">Others</p>
                          </div>
                        </div>
                      </td>
                      <td>
                      <?php
                        echo "<span>".$employeeName."</span>";
                      ?>
                      </td>
                      <td>16 Feb 2022</td>
                      <td class="text-right"><label class="badge badge-light-primary">low</label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-md-12">
          <div class="card latest-update-card">
            <div class="card-header">
              <h5>Latest Updates</h5>
              <div class="card-header-right">
                <div class="btn-group card-option">
                  <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="feather icon-more-horizontal"></i>
                  </button>
                  <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="latest-update-box">
                <div class="row p-t-30 p-b-30">
                  <div class="col-auto text-right update-meta">
                    <p class="text-muted m-b-0 d-inline-flex">1 hrs ago</p>
                    <i class="feather icon-twitter bg-twitter update-icon"></i>
                  </div>
                  <div class="col">
                    <a href="#!">
                      <h6>+ 211 Followers</h6>
                    </a>
                    <p class="text-muted m-b-0">You are getting more and more followers, keep it up!</p>
                  </div>
                </div>
                <div class="row p-b-30">
                  <div class="col-auto text-right update-meta">
                    <p class="text-muted m-b-0 d-inline-flex">8 hrs ago</p>
                    <i class="feather icon-briefcase bg-c-red update-icon"></i>
                  </div>
                  <div class="col">
                    <a href="#!">
                      <h6>+ 5 New Products were added!</h6>
                    </a>
                    <p class="text-muted m-b-0">Congratulations!</p>
                  </div>
                </div>
                <div class="row p-b-0">
                  <div class="col-auto text-right update-meta">
                    <p class="text-muted m-b-0 d-inline-flex">6 day ago</p>
                    <i class="feather icon-facebook bg-facebook update-icon"></i>
                  </div>
                  <div class="col">
                    <a href="#!">
                      <h6>+1 Friend Requests</h6>
                    </a>
                    <p class="text-muted m-b-10">This is great, keep it up!</p>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <tr>
                          <td class="b-none">
                            <a href="#!" class="align-middle">
                              <img src="../images/users/raphael101.png" alt="user image" class="img-radius wid-40 align-top m-r-15">
                              <div class="d-inline-block">
                                <h6>
                                <?php
                                  echo "<span>".$employeeName."</span>";
                                ?>
                                </h6>
                                <p class="text-muted m-b-0">CEO</p>
                              </div>
                            </a>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <a href="#!" class="b-b-primary text-primary">View all Projects</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-6">
                  <h3>26,756</h3>
                  <h6 class="text-muted m-b-0">Total visitors YTD<i class="fa fa-caret-down text-c-red m-l-10"></i></h6>
                </div>
                <div class="col-6">
                  <div id="seo-chart1" class="d-flex align-items-end"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-6">
                  <h3>2.54%</h3>
                  <h6 class="text-muted m-b-0">Server down rate YTD<i class="fa fa-caret-up text-c-green m-l-10"></i></h6>
                </div>
                <div class="col-6">
                  <div id="seo-chart2" class="d-flex align-items-end"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-6">
                  <h3>SGD 19,620,564</h3>
                  <h6 class="text-muted m-b-0">Total Sales YTD<i class="fa fa-caret-down text-c-red m-l-10"></i></h6>
                </div>
                <div class="col-6">
                  <div id="seo-chart3" class="d-flex align-items-end"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-md-12">
          <div class="card table-card review-card">
            <div class="card-header borderless ">
              <h5>Customer Reviews</h5>
              <div class="card-header-right">
                <div class="btn-group card-option">
                  <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="feather icon-more-horizontal"></i>
                  </button>
                  <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="review-block">
                <div class="row">
                  <div class="col-sm-auto p-r-0">
                    <img src="../images/users/tanbk.png" alt="user image" class="img-radius profile-img cust-img m-b-15">
                  </div>
                  <div class="col">
                    <h6 class="m-b-15">tanbk <span class="float-right f-13 text-muted"> a week ago</span></h6>
                    <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                    <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                    <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                    <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                    <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                    <p class="m-t-15 m-b-15 text-muted">We have had this car for 3 weeks. It has been trouble free, fast and fun. The simplistic interior is fantastic. We have also taken two long trips in the car, not an issue at all. Tech is outstanding.

                      Cons are Tesla has not been building vehicles for 100 years and it shows. It has more road noise than it should, fit and finish lacks versus other manufacturers.

                      Others have a long way to go to match Tesla in electric cars, Tesla has a short way to go to match others in building CARS.</p>
                    <a href="#!" class="m-r-30 text-muted"><i class="feather icon-thumbs-up m-r-15"></i>Helpful?</a>
                    <a href="#!"><i class="feather icon-heart-on text-c-red m-r-15"></i></a>
                    <a href="#!"><i class="feather icon-edit text-muted"></i></a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-auto p-r-0">
                    <img src="../images/users/Carmour.jpg" alt="user image" class="img-radius profile-img cust-img m-b-15">
                  </div>
                  <div class="col">
                    <h6 class="m-b-15">WilliamKlippgen <span class="float-right f-13 text-muted"> a week ago</span></h6>
                    <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                    <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                    <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                    <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                    <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                    <p class="m-t-15 m-b-15 text-muted">The Tesla has a bit more wind noise and you feel rough roads a bit more than our 2013 Lexus ES.

                      The interior of this car is not as nice as similarly priced luxury cars at this price point. The fit and finish isn't quite as good as a Mercedez, Lexus, BMW or Audi as far as exterior and interior. However, the driving functionality and infotainment system is amazing. After a few days driving you quickly forget about small mis-alignments only visible if you go over your car with a fine tooth comb.

                      With the Tesla you are paying for the drivetrain tech/battery and infotainment system tech, free OTA updates etc. These things are far superior to Mercedes and BMW ICE cars at a similar price point IMO.

                      There's honestly nothing like this car. It puts a smile on my face every day I drive it. Seriously, just go test drive one. I used to be skeptical, but I think all of my cars from now on will be Teslas.

                      The instant torque and regenerative braking make this thing handle like a supercar. The slowest one goes 0-60 as quick as a stock muscle car. It's legitimately insane. If you get the Performance version, it's basically the quickest car under $200k.

                      Did I mention the acceleration? Because wow.</p>
                    <a href="#!" class="m-r-30 text-muted"><i class="feather icon-thumbs-up m-r-15"></i>Helpful?</a>
                    <a href="#!"><i class="feather icon-heart-on text-c-red m-r-15"></i></a>
                    <a href="#!"><i class="feather icon-edit text-muted"></i></a>
                    <blockquote class="blockquote m-t-15 m-b-0">
                      <h6>Allina D 19croze</h6>
                      <p class="m-b-0 text-muted">Tesla Model 3 is the most amazing car I have ever driven, it beats my old Lamborghini Gallardo in both acceleration and handling. The interior takes you into the future and you feel like sitting in a spaceship going at warp speed. The soft but ergonomic leather seats are a dream and the features (Netflix, YouTube and the Dolby surround) are not matched even by the most luxurious cars out there. The 4-wheel drive and low point of gravity makes the car handle like any supercar out there and best of all - the cost of electric charging makes me save at least 75% Compared to my old petrol car.</p>
                    </blockquote>
                  </div>
                </div>
              </div>
              <div class="text-right  m-r-20">
                <a href="#!" class="b-b-primary text-primary">View all Customer Reviews</a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="mb-3">SLA Violation by Month</h5>
                  <h2>65<span class="text-muted m-l-5 f-14">cases</span></h2>
                  <div id="power-card-chart1"></div>
                  <div class="row">
                    <div class="col col-auto">
                      <div class="map-area">
                        <h6 class="m-0">985 <span> cases</span></h6>
                        <p class="text-muted m-0">year</p>
                      </div>
                    </div>
                    <div class="col col-auto">
                      <div class="map-area">
                        <h6 class="m-0">2 <span> cases</span></h6>
                        <p class="text-muted m-0">Today</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="mb-3">Service Level Management</h5>
                  <h2>641<span class="text-muted m-l-10 f-14">Breaches</span></h2>
                  <div id="power-card-chart3"></div>
                  <div class="row">
                    <div class="col col-auto">
                      <div class="map-area">
                        <h6 class="m-0">438 <span> accidents</span></h6>
                        <p class="text-muted m-0">month</p>
                      </div>
                    </div>
                    <div class="col col-auto">
                      <div class="map-area">
                        <h6 class="m-0">6 <span> Logs</span></h6>
                        <p class="text-muted m-0">Today</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12">
          <div class="card chat-card">
            <div class="card-header">
              <h5>Chat</h5>
              <div class="card-header-right">
                <div class="btn-group card-option">
                  <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="feather icon-more-horizontal"></i>
                  </button>
                  <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row m-b-20 received-chat">
                <div class="col-auto p-r-0">
                  <img src="../images/users/lucas202.png" alt="user image" class="img-radius wid-40">
                </div>
                <div class="col">
                  <div class="msg">
                    <p class="m-b-0">Nice to meet you!</p>
                  </div>
                  <p class="text-muted m-b-0"><i class="fa fa-clock-o m-r-10"></i>10:29am</p>
                </div>
              </div>
              <div class="row m-b-20 send-chat">
                <div class="col">
                  <div class="msg">
                    <p class="m-b-0">Nice to meet you!</p>
                  </div>
                  <p class="text-muted m-b-0"><i class="fa fa-clock-o m-r-10"></i>10:28am</p>
                </div>
                <div class="col-auto p-l-0">
                  <img src="../images/users/raphael101.png" alt="user image" class="img-radius wid-40">
                </div>
              </div>
              <div class="row m-b-20 received-chat">
                <div class="col-auto p-r-0">
                  <img src="../images/users/sherinna204.png" alt="user image" class="img-radius wid-40">
                </div>
                <div class="col">
                  <div class="msg">
                    <p class="m-b-0">Thanks for everything!</p>
                    <img src="assets/images/widget/dashborad-1.jpg" alt="">
                    <img src="assets/images/widget/dashborad-3.jpg" alt="">
                  </div>
                  <p class="text-muted m-b-0"><i class="fa fa-clock-o m-r-10"></i>10:20am</p>
                </div>
              </div>
              <div class="form-group m-t-15">
                <label class="floating-label" for="Project">Send message</label>
                <input type="text" name="task-insert" class="form-control" id="Project">
                <div class="form-icon">
                  <button class="btn btn-primary btn-icon">
                    <i class="feather icon-message-circle"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="card user-card2">
            <div class="card-body text-center">
              <h6 class="m-b-15">Project Risk</h6>
              <div class="risk-rate">
                <span><b>5</b></span>
              </div>
              <h6 class="m-b-10 m-t-10">Balanced</h6>
              <a href="#!" class="text-c-green b-b-success">Change Your Risk</a>
              <div class="row justify-content-center m-t-10 b-t-default m-l-0 m-r-0">
                <div class="col m-t-15 b-r-default">
                  <h6 class="text-muted">Nr</h6>
                  <h6>AWS 72%</h6>
                </div>
                <div class="col m-t-15">
                  <h6 class="text-muted">Created</h6>
                  <h6>30th Jan 2022</h6>
                </div>
              </div>
            </div>
            <button class="btn btn-success btn-block">Download Overall Report</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/js/vendor-all.min.js"></script>
  <script src="assets/js/plugins/bootstrap.min.js"></script>
  <script src="assets/js/ripple.js"></script>
  <script src="assets/js/pcoded.min.js"></script>
  <script src="assets/js/plugins/apexcharts.min.js"></script>
  <script src="assets/js/pages/dashboard-main.js"></script>
</body>
</html>
