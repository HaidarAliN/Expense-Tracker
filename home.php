<?php
session_start();
 if(empty($_SESSION["id"])){
    header('location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container-fluid bg-dark text-white">
</br>
<div class="row">
      <div class="col-md-10"></div>
      <div class="col-md-2">
      <button class="btn btn-success"  data-toggle="modal" data-target="#loginModal">Add</button>

      <button type="button" class="btn btn-dark" id="logout" >Logout</button>
      </div>
    </div>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center" >
      <h2>Your expenses:</h2>
    </div>
    <div class="col-md-4"></div>
  </div>
</br>
</br>

<div class="row text-content">
<input type="hidden" id=<?php echo "user"; ?> value=<?php echo  $_SESSION["id"] ?>>
    <div class="col-md-3"></div>
    <div class="col-md-6">
                <div class="text-content">
                    <table class="table" id="tblexpensis">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Category</th>
                          <th scope="col">Amount</th>
                          <th scope="col">date</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                      </tbody>
                    </table>
                </div>
    </div>
          <div class="col-md-3"></div>
</div>

<div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6 text-center" id="chart">

        <canvas id="mycanvas" width="256" height="256">
      </div>
    <div class="col-md-3"></div>
</div>
        </div>
</div>
<!-- add modult -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Add New expense:</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" class="row">
                    <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                    Date: 
                    <input type="date" id="date" name="birthday">
                    </div>
                    <div class="col-md-6"></div>

                    </div>
                </br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <input type="text" class="form-control mb-3" id="amount" name="amount" placeholder="Amount">
                        </div>
                    <div class="col-md-6"></div>

                    </div>
                </br>
                <div class="row">
                <div class="col-md-1">
                </div>
                    <div class="col-md-5">
                    <input type="text" class="form-control" id="categorie" name="categoire" placeholder="Insert a Categorie">
                </div>
                <div class="col-md-6">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="about-us" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        or choose one
                        <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu text-center" aria-labelledby="about-us" id="demolist">

                            </ul>
                        </div>
                    </div>
                </div>
                </br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5 text-center">
                        <button id="addr" class="btn btn-primary" type="button" >Add</button>
                        </div>
                    <div class="col-md-6"></div>

                    </div>
                </form>
            </div>
        </div>
</div>

<!-- edit module -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Please Edit here:</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" class="row">
                    <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                    Date: 
                    <input type="date" id="edate" name="birthday">
                    </div>
                    <div class="col-md-6"></div>

                    </div>
                </br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <input type="text" class="form-control mb-3" id="eamount" name="amount" placeholder="Amount">
                        </div>
                    <div class="col-md-6"></div>

                    </div>
                </br>
                <div class="row">
                <div class="col-md-1">
                </div>
                    <div class="col-md-5">
                    <input type="text" class="form-control" id="ecategorie" readonly name="categoire" placeholder="Insert a Categorie">
                </div>
                <div class="col-md-6">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="about-us" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        or choose one
                        <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu text-center" aria-labelledby="about-us" id="demolist2">

                            </ul>
                        </div>
                    </div>
                </div>
                </br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5 text-center">
                        <button id="edit" class="btn btn-primary" type="button" >Update</button>
                        </div>
                    <div class="col-md-6"></div>

                    </div>
                </form>
            </div>
        </div>
</div>

<script src="js/lgt.js"></script>
<script src="js/home.js"></script>
<script src="js/Chart.js"></script>

</body>
</html>
