<?php

//connect to the database
include_once("db.php");

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


    //total number in row
    public function totalRow(){

        global $pdo;

        $query = $pdo->prepare("SELECT NULL FROM blog");
        $query->execute();

        return $query->rowCount() ;
    }


    //for pagination
    public function paginate(){

        global $pdo;

        $perPage = 2;

        if(isset($_GET['page'])) {
          $page = preg_replace('#[^0-9]#','',$_GET['page']);
        }else {
          $page = 1;
        }

        $totalRow = $this->totalRow();
        $lastPage = ceil($totalRow/$perPage);

        //avoid people playing with number page
        if($page < 1){
          $page = 1;
        }else if($page > $lastPage){
          $page = $lastPage;
        }

        //return only b, start on record a+1 (OFFSET a)
        $limit="LIMIT ".($page-1)*$perPage.", $perPage";

        $query = $pdo->prepare("SELECT * FROM blog ORDER BY id $limit");
        $query->execute();
        // print_r($query);

        if($lastpage != 1){

          if($page != 1){
            $prev = $page-1;
            $pagination.='<a href="index.php?page='. $prev .'">PREV</a>';
          }

          if($page != $lastPage){
            $next = $page+1;
            $pagination.='<a href="index.php?page='. $next .'">NEXT</a>';
          }

        }

        return array($query->fetchAll(),$pagination);
    }


 } //close tag for class Blog

?>
