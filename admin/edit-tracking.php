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

function updateTracking($tnumber,
$sname,
$scontact,
$smail,
$sadresse,
$status,
$dispatchl,
$rname,
$rcontact,
$rmail,
$radresse,
$current_loc,
$description,
$dispatch,
$delivery)
{
  
    global $cnx;

    $sql = "UPDATE tracking SET sname=:sname,scontact=:scontact,smail=:smail,sadresse=:sadresse,status=:status,
    dispatchl=:dispatchl,rname=:rname,rcontact=:rcontact,rmail=:rmail,radresse=:radresse,
    current_loc=:current_loc,description=:description,dispatch=:dispatch,delivery=:delivery where tnumber='$tnumber'";
    
    $req = $cnx->prepare($sql)  or die(print_r($cnx->errorInfo( )));

    $req -> execute(array(
      'sname' =>  $sname,
      'scontact' =>  $scontact,
      'smail' =>  $smail,
      'sadresse' =>  $sadresse,
      'status' =>  $status,
      'dispatchl' =>  $dispatchl,
      'rname' =>  $rname,
      'rcontact' =>  $rcontact,
      'rmail' =>  $rmail,
      'radresse' =>  $radresse,
      'current_loc' =>  $current_loc,
      'description' =>  $description,
      'dispatch' =>  $dispatch,
      'delivery'  =>  $delivery
    ));

}


function getTracking($tnumber)
{
  global $cnx;

  $sql = "SELECT * FROM tracking where tnumber = '$tnumber'";

  
  $req = $cnx->query($sql) or die(print_r($cnx->errorInfo()));

  $aff = [];

  while ($rows = $req->fetch()) {
    $aff[] = $rows;
  }

  $req->closeCursor();
  return $aff;
}


// -------------- track Model End---------------

// -------------- track Controller Starts here ---------------
if(isset($_POST['update'])){

  $tnumber = $_POST['tnumber'];
  $sname = $_POST['sname'];
  $scontact = $_POST['scontact'];
  $smail = $_POST['smail'];
  $sadresse = $_POST['sadresse'];
  $status = $_POST['status'];
  $dispatchl = $_POST['dispatchl'];
  $rname = $_POST['rname'];
  $rcontact = $_POST['rcontact'];
  $rmail = $_POST['rmail'];
  $radresse = $_POST['radresse'];
  $current_loc = $_POST['current_loc'];
  $description = $_POST['description'];
  $dispatch = $_POST['dispatch'];
  $delivery = $_POST['delivery'];

  $getTrackings = getTracking($tnumber);



  updateTracking($tnumber,
  $sname,
  $scontact,
  $smail,
  $sadresse,
  $status,
  $dispatchl,
  $rname,
  $rcontact,
  $rmail,
  $radresse,
  $current_loc,
  $description,
  $dispatch,
  $delivery);

  echo "<script>window.location.href = 'dashboard.php' </script>";


}




if(isset($_GET['tnumber'])){

    $tnumber = $_GET['tnumber'];
    $getTrackings = getTracking($tnumber);

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
                <a class="navbar-brand brand-logo" href="dashboard.php"><img src="../logo/logo.png" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="../logo/logo.png" alt="logo"/></a>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                
                
                
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <span class="nav-profile-name"><?= $_SESSION['login'] ?></span>
                    <!-- <span class="online-status"></span> -->
                    <img src="images/faces/face28.png" alt="profile"/>
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

        <?php foreach ($getTrackings as $getTracking) : ?>

<div class="row">
	<div class="col-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
      <input type="text" readonly="" value="<?= $getTracking['tnumber'] ?>" name="tnumber" class="form-control" id="exampleInputUsername1" placeholder="Tracking Number" Required>				
			</div>
		</div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sender's Info</h4>
          <p class="card-description"></p>
          <form method="post" action="edit-tracking.php" class="forms-sample">
          <div class="form-group">
              <label for="exampleInputUsername1" style="font-weight: bold;">Tracking Number</label>
              <input type="text" class="form-control" readonly name="tnumber" value="<?= $getTracking['tnumber'] ?>" id="exampleInputUsername1" placeholder="Tracking Number" Required>
            </div>
            <div class="form-group">
              <label for="exampleInputUsername1">Sender's Name</label>
              <input type="text" class="form-control" name="sname" value="<?= $getTracking['sname'] ?>" id="exampleInputUsername1" placeholder="Sender's Name" Required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Sender's Contact</label>
              <input type="number" class="form-control" value="<?= $getTracking['scontact'] ?>" name="scontact" id="exampleInputEmail1" placeholder="Sender's Contact" Required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Sender's Email</label>
              <input type="text" class="form-control" name="smail" value="<?= $getTracking['smail'] ?>" id="exampleInputPassword1" placeholder="Sender's Email" Required>
            </div>
            <div class="form-group">
              <label for="exampleInputConfirmPassword1">Sender's Address</label>
              <textarea class="form-control" placeholder="Sender's Address" name="sadresse" Required><?= $getTracking['sadresse'] ?></textarea>
            </div>
            <h4 class="card-title">Other Info</h4>
            <div class="form-group">
              <label for="exampleInputPassword1">Status</label>
              <select class="form-control" name="status">
              	<option value="<?= $getTracking['status'] ?>">Current Status - <?= $getTracking['status'] ?></option>
              	<option value="Active">Active</option>
              	<option value="Inactive">Inactive</option>
              	<option value="Picked Up">Picked Up</option>
              	<option value="Arrived">Arrived</option>
              	<option value="Delivered">Delivered</option>
              	<option value="On hold">On hold</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Dispatch Location</label>
              <input type="text" class="form-control" value="<?= $getTracking['dispatchl'] ?>" name="dispatchl" id="exampleInputPassword1" placeholder="Origin Port">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Current Location</label>
              <input type="text" class="form-control" value="<?= $getTracking['current_loc'] ?>" name="current_loc" id="exampleInputPassword1" placeholder="Current Location" Required>
            </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Receiver's Info</h4>
          <p class="card-description">
          </p>
      
            <div class="form-group">
              <label for="exampleInputUsername1">Receiver's Name</label> 
              <input type="text" class="form-control" value="<?= $getTracking['rname'] ?>" name="rname" id="exampleInputUsername1" placeholder="Receiver's Name" Required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Receiver's Contact</label>
              <input type="number" class="form-control" value="<?= $getTracking['rcontact'] ?>" name="rcontact" id="exampleInputEmail1" placeholder="Receiver's Contact" Required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Receiver's Email</label>
              <input type="text" name="rmail" class="form-control" value="<?= $getTracking['rmail'] ?>" id="exampleInputPassword1" placeholder="Receiver's Email" Required>
            </div>
            <div class="form-group">
              <label for="exampleInputConfirmPassword1">Receiver's Address</label>
              <textarea class="form-control" name="radresse" placeholder="Receiver Address" Required><?= $getTracking['radresse'] ?></textarea>
            </div>
            <h4 class="card-title">Other Info</h4>
            <div class="form-group">
              <label for="exampleInputPassword1">Package Description</label>
              <input type="text" class="form-control" name="description" value="<?= $getTracking['description'] ?>" id="exampleInputPassword1" placeholder="Package Description" Required>
            </div>
           <div class="form-group">
              <label for="exampleInputPassword1">Dispatch Date</label>
              <input type="date" class="form-control" name="dispatch" value="<?= $getTracking['dispatch'] ?>" id="exampleInputPassword1" placeholder="Dispatch Date" Required>
            </div>
          	<div class="form-group">
              <label for="exampleInputPassword1">Estimated Delivery Date</label>
              <input type="date" class="form-control" value="<?= $getTracking['delivery'] ?>" name="delivery" id="exampleInputPassword1" placeholder="Estimated Delivery Date" Required>
            </div>
        </div>
      </div>
    </div>
</div>
    <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
            	<button class="btn btn-lg btn-success btn-block" name="update">Update</button>
            </div>
        </div>
        </form>
    </div>

    <?php endforeach; ?>

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