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

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products Pricing</h1>
        
      </div>

      <?php
        if (isset($_GET['DeleteEntries']) && $_GET['DeleteEntries']=='Successful') {
          echo "<div class='alert alert-success' role='alert'>Data successfully deleted.</div>";
        } else if (isset($_GET['UpdateEntries']) && $_GET['UpdateEntries']=='Successful') {
          echo "<div class='alert alert-success' role='alert'>Data successfully updated.</div>";
        }
      ?>

      <div class="table-responsive">
      <form action="product-dbconfirm.php" method="post">
        
      <?php

      $sql = "SELECT * FROM product;";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck >0){
        
        echo "<table class='table table-striped table-sm'>";
        echo "<thead><tr>";
        if ($userAuth=='Admin') {
        echo "<th scope='col'>". 'select' . "</th>";
        }
        echo "<th scope='col'>" . 'product_id'
        . "</th><th scope='col'>" . 'product'
        . "</th><th scope='col'>" . 'model'
        . "</th><th scope='col'>" . 'price'
        . "</th><th scope='col'>" . 'country'
        . "</th><th scope='col'>" . 'currency'
        . "</th></tr></thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result))
        {
          echo "<tr>";
          if ($userAuth=='Admin') {
          echo "<td><input type='checkbox' name='product_id[]' value='". $row['product_id']."'></td>";
          }
          echo "<td>" . $row['product_id'] 
          . "</td><td>" . $row['product'] 
          . "</td><td>" . $row['model']
          . "</td><td>" . $row['price']
          . "</td><td>" . $row['country']
          . "</td><td>" . $row['currency']
          . "</td></tr>";
        };
          echo "</tbody></table><div class='text-center my-4'>";
          if ($userAuth=='Admin') {
            echo "<button class='btn btn-warning mx-3' type='submit' name='action' value='Update'>Update</button>";
            echo "<button class='btn btn-danger' type='submit' name='action' value='Delete'>Delete</button>";
          }
          
        } else {
          echo "0 results";
        }
      ?>

      </form>
      </div>


    </main>

<?php templateFooter(); ?>
