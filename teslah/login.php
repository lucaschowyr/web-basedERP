<?php
  include_once 'includes/dbconnect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TeslahSG Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="login.css" rel="stylesheet">
  </head>

  <body class="text-center">
      <main class="form-signin">

        <img class="my-4" src="images/teslah-logo-mini.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-4 fw-normal">Please Log In</h1>

        <?php
          if (isset($_GET['error']) && $_GET['error']=='wrongpwd') {
          echo "<div class='alert alert-danger mx-5' role='alert'>You have entered an <strong>incorrect password</strong></div>";
          }
          else if (isset($_GET['error']) && $_GET['error']=='nouser') {
            echo "<div class='alert alert-danger mx-5' role='alert'>You have entered an <strong>incorrect User ID</strong></div>";
          }
          else if (isset($_GET['error']) && $_GET['error']=='emptyfields') {
            echo "<div class='alert alert-danger mx-5' role='alert'>Please enter <strong>User ID and password</strong></div>";
          }
          else if (isset($_GET['error']) && ($_GET['error']=='sqlerror' || $_GET['error']=='connectionerror')) {
            echo "<div class='alert alert-danger mx-5' role='alert'>Unable to login. Please contact the IT Department.</strong></div>";
          }
          else if (isset($_GET['status']) && $_GET['status']=='logout') {
            echo "<div class='alert alert-success mx-5' role='alert'>You have successfully logged out.</strong></div>";
          }
        ?>
   
        <form action="includes/login.inc.php" method="POST">

          <div class="form-floating mx-5">
            <input type="text" class="form-control" id="floatingInput" name="loginUserid" placeholder="User ID">
            <label for="floatingInput">User ID</label>
          </div>
          <div class="form-floating mx-5">
            <input type="password" class="form-control" id="floatingPassword" name="loginPwd" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>

          <button class="mt-3 w-50 btn btn-lg btn-primary" type="submit" name="login-submit">Log In</button>
          <p class="mt-4 mb-3 text-muted">&copy; TeslahSG Pte Ltd</p>
          
        </form>

      </main>
    
  </body>
</html>
