<?php
function userSession($deptDashboard) { 
global $loginUserid, $employeeName, $jobPosition, $userDept, $userAuth, $userStatus;

if (!isset($_SESSION['loginUserid'])) {

header('location:../error.php?status=notloggedin');

} else if (isset($_SESSION['loginUserid']) && (isset($_SESSION['dept'])) && $_SESSION['status']=='Active') {

if ($_SESSION['dept'] == $deptDashboard || $_SESSION['dept'] == 'Management') {

$loginUserid = $_SESSION['loginUserid'];
$employeeName = $_SESSION['employeeName'];
$jobPosition = $_SESSION['jobPosition'];
$userDept = $_SESSION['dept'];
$userAuth = $_SESSION['auth'];
$userStatus = $_SESSION['status'];

}
else {
  header( 'location:../error.php?status=accessdenied');
}

} else {

session_start();
session_unset();
session_destroy();
header("location: ../error.php?status=deactivated");

}
} ?>

<!-- HTML boilerplate functions -->
<?php function templateHeader(){ ?>
<!doctype html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <title>TeslahSG Pte Ltd</title>
    <link rel='stylesheet' href='css/style.css''>
    <link rel='stylesheet' href='https://unpkg.com/@icon/themify-icons/themify-icons.css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.3.1/css/flag-icon.min.css' rel='stylesheet'/>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <link href='css/index.css' rel='stylesheet'>
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
  </head>
  <body>
<?php } ?>

<?php function templateTopNav() { ?>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <div class="navbar-brand col-md-3 col-lg-2 me-0 px-3">
    <span><img class="bg-white navbar-brand py-0" src="../images/teslah-logo-mini-white.svg" width="30" alt=""></span>
    <a class="navbar-dark navbar-brand" href="#">TeslahSG</a>
  </div>
  
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark"></input>ß
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-4" href="../logout.php">Logout</a>
    </div>
  </div>
</header>
<?php } ?>

<?php function templateUserProfile() {
    global $loginUserid, $employeeName, $jobPosition, $userDept; ?>
<!-- User Profile -->
<div class="nav inline-flex px-3 p-4">
<div class="d-flex flex-column nav-profile-image mx-1">
  
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
<?php }?>

<?php function itemDashboard($page) { 
    if ($page=='dashboard'){ $activeDashboard='active';}?>
<li class="nav-item">
    <a class="nav-link <?php echo $activeDashboard ?> pr-2" aria-current="page" href="index.php">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
      <span data-feather="home"></span>
      Dashboard
    </a>
  </li>
<?php }?>

<?php function itemCatalogue($page) {
    if ($page=='catalogue'){ $activeCatalogue='active';}?>
    <li class="nav-item">
            <a class="nav-link <?php echo $activeCatalogue ?>" href="catalogue.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
              <span data-feather="cart"></span>
              Product Catalogue
            </a>
          </li>
<?php }?>

<?php function itemForms($page, $table) {
global $userAuth;
if ($page=='forms'){ 
    { $activeForms='active'; $showForms='show';}
    if ($table=='sales'){$activeSales='active';}
    else if ($table=='product'){$activeProduct='active';} }
if ($userAuth=='Admin'): ?>
<li class='nav-item'>
    <a class='nav-link accordion-header <?php echo $activeForms ?>' data-bs-toggle='collapse' href='#collapseForms' role='button' aria-expanded='false' aria-controls='collapseForms'>
    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-file'><path d='M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z'></path><polyline points='13 2 13 9 20 9'></polyline></svg>
    <span data-feather='file'></span>
    Forms
    </a>
    <div class='<?php echo $showForms ?> collapse' id='collapseForms'>
    <div class='nav-link'>
        <ul class='nav flex-column sub-menu'>
        <li class='nav-item'><i class='glyphicon glyphicon-home'></i><a class='nav-link <?php echo $activeSales ?>' href='sales-form.php'>Sales</a></li>
        <li class='nav-item'> <a class='nav-link <?php echo $activeProduct ?>' href='product-form.php'>Products</a></li>
        </ul>
    </div>
    </div>
</li>
<?php endif; }?>

<?php function itemTables($page, $table) {
if ($page=='tables'){ 
    { $showTables='show'; $activeTables='active';}
    if ($table=='sales'){$activeSales='active'; }
    else if ($table=='product'){$activeProduct='active';} 
    else if ($table=='summary'){$activeSummary='active';} } ?>
    <li class="nav-item">
            <a class="nav-link accordion-header <?php echo $activeTables ?>" data-bs-toggle="collapse" href="#collapseTables" role="button" aria-expanded="false" aria-controls="collapseTables">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
              <span data-feather="layers"></span>
              Tables
            </a>
            <div class="<?php echo $showTables ?>collapse" id="collapseTables">
              <div class="nav-link">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link <?php echo $activeSales ?>" href="sales-table.php">Sales</a></li>
                  <li class="nav-item"> <a class="nav-link <?php echo $activeProduct ?>" href="product-table.php">Products</a></li>
                  <li class="nav-item"> <a class="nav-link <?php echo $activeSummary ?>" href="table-summary.php">Summary</a></li>
                </ul>
              </div>
            </div>
          </li>
<?php }?>

<?php function itemManagement() {
    global $userDept;
          if ($userDept=='Management'): ?>
                <button class='text-start btn btn-block btn-outline-secondary' ><a style='all:unset' href='../management/index.php'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='20' height='16' viewBox='0 0 20 16' fill='currentColor' class='bi bi-arrow-left-circle-fill'>
                    <path d='M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z'/>
                  </svg>
                  Management
                </a></button>

<?php endif; }?>

<?php function leftPane($page, $table) {?>
  <div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">

          <?php templateUserProfile();?>

        <ul class="nav flex-column">
          
          
          <?php
          itemDashboard($page);
          itemCatalogue($page);
          itemForms($page, $table);
          itemTables($page, $table);
          itemManagement();
          ?>
          
        </ul>
        
      </div>
    </nav>

<?php }?>

<?php function templateFooter() { ?>
  </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  
  <script src="js/index-charts.js"></script> 
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
<?php } ?>

<?php function () { ?>

<?php } ?>