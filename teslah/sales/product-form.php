<?php

session_start();   

include_once './functions/functions.php';
include_once '../includes/dbconnect.php';

userSession('Sales');

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('forms','product');
?>

<!-- Page Content -->
    <!-- Product Form -->
    <div class="container">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5">
          <div class="pt-5 pb-0 text-center">
            <h2>Product Pricing</h2>
            <p class="lead">Please fill in the form below with accurate details about a product.</p>

            <?php
            if (isset($_GET['Entries']) && $_GET['Entries']=='Successful')
            {
              echo "<div class='text-start alert alert-success' role='alert'> Product Form was successfully submitted!</div>";
            } else if (isset($_GET['Entries']) && $_GET['Entries']=='Error') {
              echo "<div class='text-start alert alert-danger' role='alert'> There was an error with your form submission. Please check!</div>";
            }
            ?>
          </div>
              
          <form action="includes/dbinsert.php?table=product" method="POST" class="needs-validation" novalidate>

            <hr class="my-4">

            <h4 class="mb-3">Product Details</h4>
            <div class="row g-3">
              <div class="col-md-4">
                <label for="product" class="form-label">Product</label>
                <input type="text" class="form-control" name="fProduct" placeholder="Enter Product Name" required>
                <div class="invalid-feedback">
                  Name of product required.
                </div>
              </div>
  
              <div class="col-md-4">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" name="fModel" placeholder="Enter Model" required>
                <div class="invalid-feedback">
                  Model of product required.
                </div>
              </div>

              <div class="col-md-4">
                <label for="model" class="form-label">Country</label>
                <select class="form-select" name="fCountry" required>
                  <option value="" disabled selected hidden>Select</option>
                  <option value="Singapore">Singapore</option>
                  <option value="China">China</option>
                  <option value="Vietnam">Vietnam</option>
                </select>
                <div class="invalid-feedback">
                  Please select country for product sales.
                </div>
              </div>
            </div>

            <hr class="my-4">
            <h4 class="mb-3">Price</h4>
            <div class="row g-3">
              <div class="col-md-2">
                <label for="qty" class="form-label">Amount</label>
                <input type="number" class="form-control" min="0" name="fPrice" placeholder="Price" required>
                <div class="invalid-feedback">
                  Price of product required.
                </div>
              </div>
                
              <div class="col-md-2">
                <label for="qty" class="form-label">Currency</label>
                <input type="text" class="form-control" name="fCurrency" placeholder="Currency" required>
                <div class="invalid-feedback">
                  Price currency of product required.
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
