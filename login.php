<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <!-- Icons font CSS-->
    <link
      href="vendor/mdi-font/css/material-design-iconic-font.min.css"
      rel="stylesheet"
      media="all"
    />
    <link
      href="vendor/font-awesome-4.7/css/font-awesome.min.css"
      rel="stylesheet"
      media="all"
    />
    <!-- Font special for pages-->
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all" />
    <link
      href="vendor/datepicker/daterangepicker.css"
      rel="stylesheet"
      media="all"
    />

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all" />
  </head>
  <body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
      <div class="wrapper wrapper--w680">
        <div class="card card-4">
          <div class="card-body">
            <h2 class="title">
              <?php
                    if (!empty($_SESSION["flash"])){
                    $x = $_SESSION["flash"];
                    $_SESSION["flash"]="";
                    echo $x;} 
                    else{echo "Login Form";} 
            ?>
          </h2>
            <form method="POST" id="loginForm" action="php/login.php" method="POST">
              <div class="row row-space">
                <div class="col-2">
                  <div class="input-group">
                    <label class="label" id="validemail">Email</label>
                    <input
                      class="input--style-4"
                      required
                      id="email"
                      type="email"
                      name="email"
                    />
                  </div>
                </div>
                <div class="col-2">
                  <div class="input-group">
                    <label class="label" id="passw">Password</label>
                    <input
                      class="input--style-4"
                      required
                      type="password"
                      name="password"
                      id="password"
                    />
                  </div>
                </div>
              </div>
              <div class="p-t-15" style="text-align: center;">
                <button
                  class="btn btn--radius-2 btn--blue"
                  type="button"
                  id="loginButton"
                >
                  Login
                </button>
              </div>
            </form>
            </br>
            <div class="title" style="text-align: center;"><a class="text-warning stretched-link" href="index.php">Register for a new account</a></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
    <script src="js/login.js"></script>
  </body>
</html>
