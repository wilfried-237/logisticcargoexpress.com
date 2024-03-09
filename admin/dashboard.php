<?php

// -------------- Checking Session ---------------
session_start();

if (isset($_SESSION['login'])) {
} else {
  echo "<script>window.location.href = 'signin.php' </script>";
}



// -------------- Connection to database ---------------

include 'conex.php';


// -------------- Dashboard Model Starts here---------------

function getTracking()
{
  global $cnx;

  $sql = "SELECT * FROM tracking";

  $req = $cnx->query($sql) or die(print_r($cnx->errorInfo()));

  $aff = [];

  while ($rows = $req->fetch()) {
    $aff[] = $rows;
  }

  $req->closeCursor();
  return $aff;
}

function getMessage()
{
  global $cnx;

  $sql = "SELECT * FROM contact";

  $req = $cnx->query($sql) or die(print_r($cnx->errorInfo()));

  $aff = [];

  while ($rows = $req->fetch()) {
    $aff[] = $rows;
  }

  $req->closeCursor();
  return $aff;
}


function deleteTracking($tnumber)
{
  global $cnx;

  $sql = "DELETE FROM tracking WHERE tnumber= '$tnumber'";

  $cnx->exec($sql) or die(print_r($cnx->errorInfo()));
}

function deleteContact($id)
{
  global $cnx;

  $sql = "DELETE FROM contact WHERE id= '$id'";

  $cnx->exec($sql) or die(print_r($cnx->errorInfo()));
}



// -------------- Dashboard of Login Model End---------------




// -------------- Dashboard Controller Starts here ---------------

$getTrackings = getTracking();
$getMessages = getMessage();

if (isset($_POST["delete"]) && isset($_POST["tnumber"])) {

  $tnumber = $_POST["tnumber"];
  deleteTracking($tnumber);
  echo "<script>window.location.href = 'dashboard.php' </script>";
}

if (isset($_POST["contact"])) {

  $id = $_POST["id"];
  deleteContact($id);
  echo "<script>window.location.href = 'dashboard.php' </script>";
}

// -------------- Dashboard Controller Ends here ---------------





?>
























<!-- <script>window.location.href = 'signin.php' </script> -->
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

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">TRACKERS</h4>

                  <div class="table-responsive pt-3">
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Tracking Number</th>
                          <th>Status</th>
                          <th>Date Added</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $i = 1;
                        foreach ($getTrackings as $getTracking) : ?>
                          <form method="post" action="dashboard.php">
                            <input type="hidden" name="tnumber" value="<?= $getTracking['tnumber'] ?>">
                            <tr>
                              <td><?= $i ?></td>
                              <td><b><?= $getTracking['tnumber'] ?></b></td>
                              <td><b><?= $getTracking['status'] ?></b></td>
                              <td><b><?= $getTracking['dispatch'] ?> <?= $getTracking['delivery'] ?></b></td>
                              <td><a href="edit-tracking.php?tnumber=<?= $getTracking['tnumber'] ?>" class="btn btn-primary">Update</a></td>
                              <td><button type="submit" name="contact" onclick="return confirm('Do you really want to delete this Tracking?')" class="btn btn-danger">Delete</button></td>
                            </tr>
                          </form>

                        <?php $i++;
                        endforeach; ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">MESSAGES</h4>

                  <div class="table-responsive pt-3">
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Subject</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Message</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $i = 1;
                        foreach ($getMessages as $getMessage) : ?>
                          <form method="post" action="dashboard.php">
                            <input type="hidden" name="id" value="<?= $getMessage['id'] ?>">
                            <tr>
                              <td><?= $i ?></td>
                              <td><b><?= $getMessage['name'] ?></b></td>
                              <td><b><?= $getMessage['subject'] ?></b></td>
                              <td><b><?= $getMessage['email'] ?></b></td>
                              <td><b><?= $getMessage['phone'] ?></b></td>
                              <td><b><?= $getMessage['message'] ?></b></td>
                              <td><button type="submit" name="contact" onclick="return confirm('Do you really want to delete this message?')" class="btn btn-danger">Delete</button></td>
                            </tr>
                          </form>

                        <?php $i++;
                        endforeach; ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
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