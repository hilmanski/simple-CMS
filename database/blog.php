<?php

 class Blog {

    //fetch all the blog data
    public function fetch_all(){

       global $pdo;

        $query = $pdo->prepare(" SELECT * FROM blog ");
        $query->execute();

        return $query->fetchAll();
      }

    //fetch data from spesific id
    public function fetch_single($blog_id){

      global $pdo;
      $query = $pdo->prepare(" SELECT * FROM blog WHERE id=? ");
      $query->bindValue(1, $blog_id );
      $query->execute();

      return $query->fetch();
    }


 }

?>
