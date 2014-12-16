<?php

  include_once("database/blog.php");

  $blogList = new Blog;
  $rows = $blogList->paginate()[0];
  $pagination = $blogList->paginate()[1];

?>

<!doctype html>
<html>
  <head>

  </head>
  <body>


    <h2>Pagination</h2>

    <?php echo $pagination; ?>

      <h1>Home Page, Custom CMS</h1>
      <h2><a href="admin/">Login admin</a></h2>

      <ol>
          <?php foreach($rows as $row) { ?>
            <li>
              <h3>
                 <a href="single.php?id=<?php echo $row['id']; ?> ">
                   <? echo $row['title']; ?>
                 </a>
              </h3>
              <p>  <? echo $row['content']; ?> </p>
              <p> Created At: <? echo $row['created_at']; ?> </p>
              <p> Tag:  <? echo $row['tag']; ?> </p>
            </li>
          <?php } ?>
      </ol>

      <?php include_once("template/searchform.php"); ?>



  </body>

</html>
