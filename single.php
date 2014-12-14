<?php

//connect to the database and buffer the blog.php page
include_once("database/db.php");
include_once("database/blog.php");

$blogList = new Blog;


if(isset($_GET['id'])){
  $id = $_GET['id'];
  $singleList = $blogList->fetch_single($id);
?>


<!doctype html>
<html>
  <head>
    <title><?php echo $singleList['title']; ?></title>
  </head>
  <body>

    <h1>Own CMS, be Proud !</h1>


          <h3>
            <a href="single.php?id=<?php echo $singleList['id']; ?> ">
              <? echo $singleList['title']; ?>
            </a>
          </h3>
          <p>  <? echo $singleList['content']; ?> </p>
          <p> Created At: <? echo $singleList['created_at']; ?> </p>
          <p> Tag:  <? echo $singleList['tag']; ?> </p>

          <a href="index.php"> &larr;Back </a>

  </body>

</html>

<?php

  } else {
    header('Location: index.php');
    exit();
  }

?>
