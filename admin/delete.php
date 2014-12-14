<?php

session_start();

include_once('../database/db.php');
include_once('../database/blog.php');


  if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = $pdo-> prepare('DELETE FROM blog WHERE id = ?');
    $query->bindValue(1, $id);
    $query->execute();

    Header('Location: index.php');
    
  }



?>
