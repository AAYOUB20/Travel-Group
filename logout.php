<?php
include "SQL_connection.php"; // include il connection al database

session_start();

if (isset($_COOKIE['remember_token'])) {
  setcookie('remember_token', false , time() - 3600);  
  unset($_COOKIE['remember_token']);
}

session_destroy(); // destroy the session
sleep(0.7); // attesa di 0.7 secondi
header("Location: login.php");
?>