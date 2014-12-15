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

      if(isset($src)) {

          //replace the first argument with second(blank)
          $searchq = preg_replace("#[^0-9a-z]#i","",  $src);

          //echo $searchq;

          $query = $pdo->prepare("SELECT * FROM blog WHERE title LIKE '%$searchq%'");

          $query->execute();

          $count = $query->rowCount();

          if($count == 0){
            $output = 'nothing found!';
          }else {

            while($row = $query->fetch()) {
              $fname = $row['title'];
              $lname = $row['content'];

              $output .= '<div>'.$fname.' '.$lname.'</div>';

            }
          }
        }

        echo($output);
    }


 }

?>
