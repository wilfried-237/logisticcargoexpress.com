<?php

// -------------- Checking Session ---------------
session_start();


// -------------- Connection to database ---------------


include 'admin/conex.php';


// -------------- Email-list Model Starts here---------------

function addEmail($email)
{
  global $cnx;
  $user = [
    'email' => $email
  ];
  $sql = "INSERT INTO email(email) VALUES(:email)";
  $req = $cnx->prepare($sql);
  $req->execute($user);
}

if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = $_POST['email'];
    addEmail($email);
    echo "<script>window.location.href = 'index.html' </script>";
}else{
  echo "<script>window.location.href = 'contact.html' </script>";
}