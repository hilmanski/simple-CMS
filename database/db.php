<?php

  $host = "localhost";
  $user = "root";
  $password = "root";
  $db = "cms";

  try{
      $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
  } catch(PDOException $e){
      exit('Database error');
  }


?>
