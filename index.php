<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags-->
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="Colorlib Templates" />
    <meta name="author" content="Colorlib" />
    <meta name="keywords" content="Colorlib Templates" />

    <!-- Title Page-->
    <title>Registeration form</title>

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
                    echo $x;} 
                    else{echo "Registration Form";} 
            ?>
            </h2>

            <form method="POST" id="signupForm" action="php/signup.php" method="POST" >
              <div class="row row-space">
                <div class="col-2">
                  <div class="input-group">
                    <label class="label" id="fn">first name</label>
                    <input
                      class="input--style-4"
                      required
                      minlength="3"
                      type="text"
                      name="first_name"
                      id="first_name1"
                    />
                  </div>
                </div>
                <div class="col-2">
                  <div class="input-group">
                    <label class="label" id="ln">last name</label>
                    <input
                      class="input--style-4"
                      required
                      minlength="3"
                      type="text"
                      name="last_name"
                      id="last_name1"
                    />
                  </div>
                </div>
              </div>
              <div class="row row-space">
                <div class="col-2">
                 
                </div>
                <div class="col-2">
                  
                </div>
              </div>
              <div class="row row-space">
                <div class="col-2">
                  <div class="input-group" id="validemail">

                     
                      <label class="label" >
                      Email   
                      </label>

                    
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

                </div>
              </div>
              <div class="row row-space">
                <div class="col-2">
                  <div class="input-group">
                    <label class="label">Password</label>
                    <input
                      class="input--style-4"
                      required
                      type="password"
                      name="password"
                      id="password"
                    />
                  </div>
                </div>
                <div class="col-2">
                  <div class="input-group">
                    <label class="label" id="cpass">Confirm password</label>
                    <input
                      class="input--style-4"
                      required
                      type="password"
                      name="confirmPassword"
                      id="confirmPassword"
                    />
                  </div>
                </div>
              </div>
              <!-- <div class="input-group">
                <label class="label">City</label>
                <div class="rs-select2 js-select-simple select--no-search">
                  <select name="city" required>
                    <option disabled selected value>Choose City</option>
                    <option>Nabatieh</option>
                    <option>Beirut</option>
                    <option>Jbeil</option>
                  </select>
                  <div class="select-dropdown"></div>
                </div>
              </div> -->
              <div class="p-t-15" style="text-align: center;">
                <button
                  class="btn btn--radius-2 btn--blue"
                  type="button"
                  id="submitButton"
                >
                  Submit
                </button>
              </div>
            </form>
                    </br>
            <div class="title" style="text-align: center;"><a class="text-warning stretched-link" href="login.php">login insted</a></div>
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
    <script src="js/script.js"></script>
  </body>
  <!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<!-- end document-->
