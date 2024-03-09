<?php
// -------------- Checking Session ---------------
session_start();

if (isset($_SESSION['login'])) {
} else {
  echo "<script>window.location.href = 'signin.php' </script>";
}



// -------------- Connection to database ---------------

include 'conex.php';


// -------------- Add Model Starts here---------------

function addUser($username, $password)
{
  global $cnx;
  $user = [
    'username' =>  $username,
    'password' =>  $password
  ];
  $sql = "INSERT INTO users(username,password) VALUES(:username,:password)";
  $req = $cnx->prepare($sql);
  $req->execute($user);
}


// -------------- Add of Login Model ---------------


// -------------- Add Controller Starts here ---------------


if (isset($_POST['save'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];


  addUser($username, $password);
  $confirm = '<h4 class="text-success">User Created Successfully</h4>';
}

// -------------- Add Controller Ends here ---------------





?>













<!-- <script>window.location.href = 'signin.php' </script>
  -->
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $_SESSION['login'] ?> Dashboard</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

  <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.4.47/css/materialdesignicons.min.css" integrity="sha512-/k658G6UsCvbkGRB3vPXpsPHgWeduJwiWGPCGS14IQw3xpr63AEMdA8nMYG2gmYkXitQxDTn6iiK/2fD4T87qA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <ul class="navbar-nav navbar-nav-left">


            </ul>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo" href="dashboard.php"><img src="../logo/logo.png" alt="logo" /></a>
              <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="../logo/logo.png" alt="logo" /></a>
            </div>
            <ul class="navbar-nav navbar-nav-right">



              <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                  <span class="nav-profile-name"><?= $_SESSION['login'] ?></span>
                  <!-- <span class="online-status"></span> -->
                  <img src="images/faces/face28.png" alt="profile" />
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a href="settings.php" class="dropdown-item">
                  <i class="mdi mdi-account-plus menu-icon"></i>
                    Settings
                  </a>
                  <a href="logout.php" class="dropdown-item">
                    <i class="mdi mdi-logout text-primary"></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
          <ul class="nav page-navigation">
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="add-tracking.php" class="nav-link">
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                <span class="menu-title">Add Tracking</span>
                <i class="menu-arrow"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="settings.php" class="nav-link">
              <i class="mdi mdi-account-plus menu-icon"></i>
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">
              <i class="mdi mdi-logout menu-icon"></i>
                <span class="menu-title">Logout</span>
                <i class="menu-arrow"></i>
              </a>

            </li>


          </ul>
        </div>
      </nav>
    </div>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-md-6 grid-margin stretch-card" style="margin: auto">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Settings</h4>
                  <p class="card-description" style="color: green;">
                      
                  </p>
                  <?php if(isset($confirm)){echo $confirm;} ?>
                  <form method="post" action="settings.php" class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Admin Name</label>
                      <input type="text" class="form-control" name="username" value="" id="exampleInputUsername1" placeholder="Admin Name" Required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Password</label>
                      <input type="password" class="form-control" value="" name="password" id="exampleInputEmail1" placeholder="Admin Password" required>
                    </div>

                    <div class="text-center">
                      <input type="submit" onclick="return confirm('Do you really want to Create this Admin?')" name="save" value="Save" class="btn btn-block btn-success">
                    </div>
                </div>
              </div>
            </div>
            </form>
          </div>



        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="footer-wrap">
            <div class="w-100 clearfix">
              <span class="d-block text-center text-sm-left d-sm-inline-block">Copyright ©Logistic Cargo Express2024 All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> <i class="mdi mdi-heart-outline"></i></span>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
</body>

</html>