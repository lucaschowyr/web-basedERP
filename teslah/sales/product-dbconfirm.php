<?php

session_start();   

include_once './functions/functions.php';
include_once '../includes/dbconnect.php';

userSession('Sales');

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('tables','product');
?>

<!-- Page Content -->
    
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
          <li class="nav-item">
            <a class="nav-link" href="catalogue.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
              <span data-feather="cart"></span>
              Product Catalogue
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link accordion-header" data-bs-toggle="collapse" href="#collapseForms" role="button" aria-expanded="false" aria-controls="collapseForms">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
              <span data-feather="file"></span>
              Forms
            </a>
            <div class="collapse" id="collapseForms">
              <div class="nav-link">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><i class="glyphicon glyphicon-home"></i><a class="nav-link" href="sales-form.php">Sales</a></li>
                  <li class="nav-item"> <a class="nav-link" href="product-form.php">Products</a></li>
                </ul>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="active nav-link accordion-header" data-bs-toggle="collapse" href="#collapseTables" role="button" aria-expanded="true" aria-controls="collapseTables">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
              <span data-feather="layers"></span>
              Tables
            </a>
            <div class="show collapse" id="collapseTables">
              <div class="nav-link">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><i class="glyphicon glyphicon-home"></i><a class="nav-link" href="sales-table.php">Sales</a></li>
                  <li class="nav-item"> <a class="active nav-link" href="product-table.php">Products</a></li>
                </ul>
              </div>
            </div>
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

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Products Pricing</h1>
        </div> 

        <?php
        if (!empty($_POST['product_id']) && $_POST['action'] == 'Update') {
            
            echo 
            "<form action='includes/dbupdate.php?table=product' method='POST'>
            <div class='alert alert-warning' role='alert'>
            Are you sure you want to permanently update the following record(s) from the database?
            </div>
            <div class='table-responsive py-3'>";
            
        } else if (!empty($_POST['product_id']) && $_POST['action'] == 'Delete') {
            
            echo
            "<form action='includes/dbdelete.php?table=product' method='POST'>
            <div class='alert alert-danger' role='alert'>
            Are you sure you want to permanently update the following record(s) from the database?
            </div>
            <div class='table-responsive py-3'>";

        }
        ?>

      
        
        <?php

            if ($_POST['action'] == 'Update') {

                if(!empty($_POST['product_id'])) {

                    echo "<table class='table table-striped table-sm'>";
                    echo "<thead><tr><th scope='col'>" . 'select'
                    . "<th scope='col'>" . 'product_id'
                    . "</th><th scope='col'>" . 'product'
                    . "</th><th scope='col'>" . 'model'
                    . "</th><th scope='col'>" . 'price'
                    . "</th><th scope='col'>" . 'country'
                    . "</th><th scope='col'>" . 'currency'
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

                    foreach($_POST['product_id'] as $selectedID) {
                    $sql = "SELECT * FROM product WHERE product_id=$selectedID;";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck >0){                        
                            
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                
                                echo "<tr><td><input type='checkbox' name='product_id[]' value='". $row['product_id']."' checked>"
                                . "</td><td>" . $row['product_id'] 
                                . "</td><td>" //$row['product']
                                . "<select name='fProduct[]' required>";
                                printOptions($row['product'], 'Car');
                                printOptions($row['product'], 'Charging Parts');
                                printOptions($row['product'], 'Car Accessories');
                                printOptions($row['product'], 'Car Parts');
                                // echo "<option value='Car'"; if ($row['product']=='Car') { echo 'selected'; } echo ">Car</option>
                                // <option value='Charging Parts'"; if ($row['product']=='Charging Parts') { echo 'selected'; } echo ">Charging Parts</option>
                                // <option value='Car Accessories'"; if ($row['product']=='Car Accessories') { echo 'selected'; } echo ">Car Accessories</option>
                                // <option value='Car Parts'"; if ($row['product']=='Car Parts') { echo 'selected'; } echo ">Car Parts</option>";
                                echo "</select>"
                                . "</td><td>" // $row['model']
                                . "<select name='fModel[]' required>";
                                printOptions($row['model'], 'Model Y');
                                printOptions($row['model'], 'Model X');
                                printOptions($row['model'], 'Model 3');
                                printOptions($row['model'], 'Model S');
                                printOptions($row['model'], 'Gen 1 NEMA Adapter');
                                printOptions($row['model'], 'Gen 1 NEMA Adapter');
                                printOptions($row['model'], 'Car Cover');
                                printOptions($row['model'], 'Wireless Phone Charger');
                                printOptions($row['model'], 'Wiper Blade');
                                printOptions($row['model'], 'HEPA Air Filtration Upgrade');
                                // echo "<option value='Model Y'"; if ($row['model']=='Model Y') { echo 'selected'; } echo ">Model Y</option>
                                // <option value='Model X'"; if ($row['model']=='Model X') { echo 'selected'; } echo ">Model X</option>
                                // <option value='Model 3'"; if ($row['model']=='Model 3') { echo 'selected'; } echo ">Model 3</option>
                                // <option value='Model S'"; if ($row['model']=='Model S') { echo 'selected'; } echo ">Model S</option>
                                // <option value='Gen 1 NEMA Adapter'"; if ($row['model']=='Gen 1 NEMA Adapter') { echo 'selected'; } echo ">Gen 1 NEMA Adapter</option>
                                // <option value='Gen 2 NEMA Adapter'"; if ($row['model']=='Gen 2 NEMA Adapter') { echo 'selected'; } echo ">Gen 2 NEMA Adapter</option>
                                // <option value='Car Cover'"; if ($row['model']=='Car Cover') { echo 'selected'; } echo ">Car Cover</option>
                                // <option value='Wireless Phone Charger'"; if ($row['model']=='Wireless Phone Charger') { echo 'selected'; } echo ">Wireless Phone Charger</option>
                                // <option value='Wiper Blade'"; if ($row['model']=='Wiper Blade') { echo 'selected'; } echo ">Wiper Blade</option>
                                // <option value='HEPA Air Filtration Upgrade'"; if ($row['model']=='HEPA Air Filtration Upgrade') { echo 'selected'; } echo ">HEPA Air Filtration Upgrade</option>";
                                echo "</select>"
                                . "</td><td>" . "<input class='col-sm-12' type='text' name='fPrice[]' value='" . $row['price'] . "'required>"
                                . "</td><td>" // $row['country']
                                ."<select name='fCountry[]' required>";
                                printOptions($row['country'], 'Singapore');
                                printOptions($row['country'], 'China');
                                printOptions($row['country'], 'Vietnam');
                                // echo  "<option value='Singapore'"; if ($row['country']=='Singapore') { echo 'selected'; } echo ">Singapore</option>
                                //   <option value='China'"; if ($row['country']=='China') { echo 'selected'; } echo ">China</option>
                                //   <option value='Vietnam'"; if ($row['country']=='Vietnam') { echo 'selected'; } echo ">Vietnam</option>";
                                echo "</select>"
                                . "</td><td>" . "<input class='col-sm-12' type='text' name='fCurrency[]' value='" . $row['currency'] . "'required>"
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

                if(!empty($_POST['product_id'])) {

                  echo "<table class='table table-striped table-sm'>";
                  echo "<thead><tr><th scope='col'>" . 'select'
                  . "<th scope='col'>" . 'product_id'
                  . "</th><th scope='col'>" . 'product'
                  . "</th><th scope='col'>" . 'model'
                  . "</th><th scope='col'>" . 'price'
                  . "</th><th scope='col'>" . 'country'
                  . "</th><th scope='col'>" . 'currency'
                  . "</th></tr></thead>";
                  echo "<tbody>";

                    foreach($_POST['product_id'] as $selectedID) {
                    $sql = "SELECT * FROM product WHERE product_id=$selectedID;";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck >0){
                        
                        while ($row = mysqli_fetch_assoc($result))
                        {
                            echo "<tr><td><input type='checkbox' name='product_id[]' value='". $row['product_id']."' checked>"
                            . "</td><td>" . $row['product_id']
                            . "</td><td>" . $row['product']
                            . "</td><td>" . $row['model']
                            . "</td><td>" . $row['price']
                            . "</td><td>" . $row['country']
                            . "</td><td>" . $row['currency']
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
            if (!empty($_POST['product_id']) && $_POST['action'] == 'Update') {

            echo
            "<button type='button' class='btn btn-secondary mx-2'>
            <a href='product-table.php' style='all:unset'>Cancel</a>
            </button>
            <button type='submit' class='btn btn-warning'>Confirm Update</button>";

            } else if (!empty($_POST['product_id']) && $_POST['action'] == 'Delete') {

            echo
            "<button type='button' class='btn btn-secondary mx-2'>
            <a href='product-table.php' style='all:unset'>Cancel</a>
            </button>
            <button type='submit' class='btn btn-danger'>Confirm Delete</button>";

            } else {
            
            echo
            "<button type='button' class='btn btn-primary mx-2'>
            <a href='product-table.php' style='all:unset'>Go Back</a>
            </button>";
            
            }
            ?>
        
      </div>

    </form>


    </main>

<?php templateFooter(); ?>
