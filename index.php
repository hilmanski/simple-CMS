<?php

//connect to the database and buffer the blog.php page
include_once("database/db.php");
include_once("database/blog.php");

$blogList = new Blog;
$blogLists = $blogList->fetch_all();

   if(isset($_POST['search'])){
      $src = $_POST['search'];
      $test = $blogList->search($src);
    }

?>

<!doctype html>
<html>
  <head>

  </head>
  <body>

      <h1>Home Page, Custom CMS</h1>
      <h2><a href="admin/">Login admin</a></h2>

      <ol>
          <?php foreach($blogLists as $blogList) { ?>
            <li>
              <h3>
                 <a href="single.php?id=<?php echo $blogList['id']; ?> ">
                   <? echo $blogList['title']; ?>
                 </a>
              </h3>
              <p>  <? echo $blogList['content']; ?> </p>
              <p> Created At: <? echo $blogList['created_at']; ?> </p>
              <p> Tag:  <? echo $blogList['tag']; ?> </p>
            </li>
          <?php } ?>
      </ol>

      <!-- add search -->
      <form action="index.php" method="post">
        <input type="text" name="search" value="">
        <input type="submit" name="submit" value="search">
      </form>

      <div id="output"></div>

  </body>

</html>
