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

    //search functionality
    public function search($src){

      global $pdo;

      //replace the first argument with second(blank)
      $searchq = preg_replace("#[^0-9a-z]#i","",  $src);

      //echo $searchq;

      $query = $pdo->prepare("SELECT * FROM blog WHERE title LIKE '%$searchq%'");

      $query->execute();

      $count = $query->rowCount();

      if($count == 0){
        echo 'nothing found!';
      }else {

      }

     return $query->fetchAll();
        // echo($output);
    }


 } //close tag for class Blog

?>
