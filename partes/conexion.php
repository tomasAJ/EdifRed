<?php

/**
 * Usuario: E2software
 * Contrasena: E2software1113
 * Nombre Base de datos: E2software_bd
 * 
 */
$hostname = "146.83.194.142";
$username = "E2software";
$password = "E2software1113";
$database = "E2software_bd";
$conn;
try {
  $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
