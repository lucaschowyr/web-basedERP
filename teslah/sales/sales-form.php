<?php

session_start();   

include_once './functions/functions.php';
include_once '../includes/dbconnect.php';

userSession('Sales');

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('forms','sales');
?>

<!-- Page Content -->
    <!-- Sales Form -->
    <div class="container">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5">
          <div class="pt-5 pb-0 text-center">
            <!-- <img class="d-block mx-auto mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
            <h2>Sales Form</h2>
            <p class="lead">Please fill in the Sales Form below with accurate information.</p>

            <?php
            if (isset($_GET['Entries']) && $_GET['Entries']=='Successful')
            {
              echo "<div class='text-start alert alert-success' role='alert'> Sales Form was successfully submitted!</div>";
            } else if (isset($_GET['Entries']) && $_GET['Entries']=='Error') {
              echo "<div class='text-start alert alert-danger' role='alert'> There was an error with your form submission. Please check!</div>";
            }
            ?>
          </div>
              
          <form action="includes/dbinsert.php?table=sales" method="POST" class="needs-validation" novalidate>
                        
            <hr class="mb-4">
            <h4 class="mb-3">Customer Details</h4>
            <div class="row gy-3">
              <div class="col-12">
                <label for="customerName" class="form-label">Customer Name</label>
                <input type="text" class="form-control" name="fCustomerName" placeholder="Enter Name" value="" required>
                <div class="invalid-feedback">
                  Customer Name is required.
                </div>
              </div>
            
              <div class="col-sm-6">
                <label for="salespersonName" class="form-label">Salesperson Name</label>
                <input type="text" class="form-control" name="fSalespersonName" placeholder="Enter Name" value="" required>
                <div class="invalid-feedback">
                  Salesperson Name is required.
                </div>
              </div>
              <div class="col-sm-6">
                <label for="employeeID" class="form-label">Employee ID</label>
                <input type="text" class="form-control" name="fEmployeeID" placeholder="Enter ID" required>
                <div class="invalid-feedback">
                  Salesperson's Employee ID is required.
                </div>
              </div>
            </div>

            <hr class="my-4">

            <h4 class="mb-3">Purchase Details</h4>
            <div class="row g-3">
              <div class="col-md-2">
                <label for="qty" class="form-label">Product ID (<a href="./product-table.php">Check</a>)</label>
                <input type="text" class="form-control" min="1" name="fProductID" placeholder="Product ID" required>
                <div class="invalid-feedback">
                  Product ID required.
                </div>
              </div>

              <div class="col-md-5">
                <label for="product" class="form-label">Product</label>
                <select class="form-select" name="fProduct" required>
                <option value="" disabled selected hidden>Select</option>
                <option value="Car">Car</option>
                <option value="Charging Parts">Charging Parts</option>
                <option value="Car Accessories">Car Accessories</option>
                <option value="Car Parts">Car Parts</option>
                </select>
                <div class="invalid-feedback">
                  Please select a product.
                </div>
              </div>
  
              <div class="col-md-5">
                <label for="model" class="form-label">Model</label>
                <select class="form-select" name="fModel" required>
                  <option value="" disabled selected hidden>Select</option>
                  <option value="Model Y">Model Y</option>
                  <option value="Model X">Model X</option>
                  <option value="Model 3">Model 3</option>
                  <option value="Model S">Model S</option>
                  <option value="Gen 1 NEMA Adapter">Gen 1 NEMA Adapter</option>
                  <option value="Gen 2 NEMA Adapter">Gen 2 NEMA Adapter</option>
                  <option value="Car Cover">Car Cover</option>
                  <option value="Wireless Phone Charger">Wireless Phone Charger</option>
                  <option value="Wiper Blade">Wiper Blade</option>
                  <option value="HEPA Air Filtration Upgrade">HEPA Air Filtration Upgrade</option>
                </select>
                <div class="invalid-feedback">
                  Please select a product model.
                </div>
              </div>
  
              <div class="col-md-2">
                <label for="qty" class="form-label">Quantity</label>
                <input type="number" class="form-control" min="1" name="fQty" placeholder="Qty" required>
                <div class="invalid-feedback">
                  Quantity of product required.
                </div>
              </div>
                
              <div class="col-md-5">
                <label for="model" class="form-label">Country</label>
                <select class="form-select" name="fCountry" required>
                  <option value="" disabled selected hidden>Select</option>
                  <option value="Singapore">Singapore</option>
                  <option value="China">China</option>
                  <option value="Vietnam">Vietnam</option>
                </select>
                <div class="invalid-feedback">
                  Please select country of transaction.
                </div>
              </div>
            </div>

            <hr class="my-4">
            <div class="row g-3 p-4 d-flex justify-content-center">
              <button class="col-md-4 btn btn-primary btn-lg" type="submit">Submit Form</button>
            </div>
              
            
          </form>
        
          <footer class="my-3 text-muted text-center text-small">
            <p id="clock"></p>
            <p class="mb-1">&copy; TeslahSG Pte Ltd</p>
          </footer>  

        </main>
      
<?php templateFooter(); ?>
