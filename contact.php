<?php

// -------------- Checking Session ---------------
session_start();


// -------------- Connection to database ---------------


include 'admin/conex.php';


// -------------- Email-list Model Starts here---------------

function sendMessage($name,$subject,$email,$phone,$message)
{
  global $cnx;
  $user = [
    'name' => $name,
    'subject' => $subject,
    'email' => $email,
    'phone' => $phone,
    'message' => $message
  ];
  $sql = "INSERT INTO contact(name,subject,email,phone,message) VALUES(:name,:subject,:email,:phone,:message)";
  $req = $cnx->prepare($sql);
  $req->execute($user);
}

if(isset($_POST['name']) && isset($_POST['subject']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message'])){

  $name = $_POST['name'];
  $subject = $_POST['subject'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];


    $email = $_POST['email'];
    sendMessage($name,$subject,$email,$phone,$message);
    echo "<script>window.location.href = 'contact.html' </script>";
}else{
  echo "<script>window.location.href = 'contact.html' </script>";
}