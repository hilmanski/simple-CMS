<?php

  //connect to the database and buffer the blog.php page
  include_once("database/db.php");
  include_once("database/blog.php");

  $blog = new Blog;

  if(isset($_GET['search']) && isset($_GET['submit'])){
    $src = $_GET['search'];
    $searchLists = $blog->search($src);
    // print_r($searchLists);
?>


<!doctype html>
<html>
  <head>

  </head>
  <body>

    <h1>Search Page, Custom CMS</h1>
    <h2><a href="admin/">Login admin</a></h2>

    <ol>
      <?php foreach($searchLists as $searchList) { ?>
        <li>
          <h3>
            <a href="single.php?id=<?php echo $searchList['id']; ?> ">
              <? echo $searchList['title']; ?>
            </a>
          </h3>
          <p>  <? echo $searchList['content']; ?> </p>
          <p> Created At: <? echo $searchList['created_at']; ?> </p>
          <p> Tag:  <? echo $searchList['tag']; ?> </p>
        </li>
        <?php } ?>
      </ol>


  </body>

</html>



<?php

  } else {
    header('Location: index.php');
    exit();
  }

?>
