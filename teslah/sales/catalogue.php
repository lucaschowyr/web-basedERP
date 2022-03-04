<?php

session_start();   

include_once './functions/functions.php';
include_once '../includes/dbconnect.php';

userSession('Sales');

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('catalogue','');
?>

    <!-- Page Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product Catalogue</h1>
      </div>

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Model Y<span class="text-muted"> - The Versatile</span></h2>
            <p class="lead my-4">Model Y provides maximum versatility—able to carry 7 passengers and their cargo. Each second row seat folds flat independently, creating flexible storage for skis, furniture, luggage and more.</p>
            <p><button class="btn btn-primary">Learn More</button>
            <?php if ($userAuth=='Admin'): ?>
            <button class="btn btn-outline-primary mx-2"><a href="sales-form.php" style="all:unset">Order Now</a></button></p>
            <?php endif ?> 
        </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="../images/cars/modelY.jpeg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Model X<span class="text-muted"> - The Futuristic</span></h2>
            <p class="lead my-4">With the lowest drag coefficient of any SUV, Model X is built for speed and range. Refined aerodynamic elements work together with new wheels and tires to help you travel farther, with sharper handling and better ride comfort.</p>
            <p><button class="btn btn-primary">Learn More</button>
            <?php if ($userAuth=='Admin'): ?>
            <button class="btn btn-outline-primary mx-2"><a href="sales-form.php" style="all:unset">Order Now</a></button></p>
            <?php endif ?> 
        </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="../images/cars/modelX.jpeg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Model 3<span class="text-muted"> - The Ambitious</span></h2>
            <p class="lead my-4">Model 3 comes with the option of dual motor all-wheel drive, 20” Überturbine Wheels and Performance Brakes for total control in all weather conditions. A carbon fiber spoiler improves stability at high speeds, all allowing Model 3 to accelerate from 0-60 mph* in as little as 3.1 seconds.</p>
            <p><button class="btn btn-primary">Learn More</button>
            <?php if ($userAuth=='Admin'): ?>
            <button class="btn btn-outline-primary mx-2"><a href="sales-form.php" style="all:unset">Order Now</a></button></p>
            <?php endif ?> 
        </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="../images/cars/model3.jpeg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Model S<span class="text-muted"> - The Adventurer</span></h2>
            <p class="lead my-3">Model S is built from the ground up as an electric vehicle, with a high-strength architecture and floor-mounted battery pack for incredible occupant protection and low rollover risk.</p>
            <p><button class="btn btn-primary">Learn More</button>
            <?php if ($userAuth=='Admin'): ?>
            <button class="btn btn-outline-primary mx-2"><a href="sales-form.php" style="all:unset">Order Now</a></button></p>
            <?php endif ?>         
        </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="../images/cars/modelS.jpeg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="my-4">
      <footer class="my-3 text-muted text-center text-small">
        <p id="clock"></p>
        <p class="mb-1">&copy; TeslahSG Pte Ltd</p>
      </footer>

    </main>

<?php templateFooter(); ?>