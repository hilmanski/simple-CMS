<?php

include_once('../database/db.php');
include_once('../database/blog.php');

$blog = new Blog;
$blogLists = $blog->fetch_all();

?>


<!doctype html>
<html>
  <head>

  </head>
  <body>
    <h1> This is Admin Page</h1>


      <p><a href="add.php"> New Post </a></p>



      <?php foreach ($blogLists as $blogList) { ?>
        <p> <?php echo $blogList['title']; ?>
        <span>
          <a href="delete.php?id=<?php echo $blogList['id']; ?> ">
            Delete
          </a>

          <a href="../single.php?id=<?php echo $blogList['id']; ?> ">
            View
          </a>

          <a href="edit.php?id=<?php echo $blogList['id']; ?> ">
            Edit
          </a>
        </span>
        </p>
    <?php } ?>

    <a href="../"> Home Blog </a>



  </body>

</html>
