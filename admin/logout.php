<?php
session_start();

if (isset($_SESSION['login'])):
    
  session_destroy();

  echo "<script>window.location.href = 'signin.php' </script>";

else: 
    echo "<script>window.location.href = 'signin.php' </script>";
endif;


?>


