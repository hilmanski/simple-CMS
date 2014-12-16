<?php

include_once("database/blog.php");

$blog = new Blog;


if(isset($_GET['id'])){
  $id = $_GET['id'];
  $singleList = $blog->fetch_single($id);

  // print_r($singleList);
?>


<!doctype html>
<html>
  <head>
    <title><?php echo $singleList['title']; ?></title>
  </head>
  <body>

    <h1>Single Page !!</h1>

    <h3>
      <a href="single.php?id=<?php echo $singleList['id']; ?> ">
        <? echo $singleList['title']; ?>
      </a>
    </h3>
    <p>  <? echo $singleList['content']; ?> </p>
    <p> Created At: <? echo $singleList['created_at']; ?> </p>
    <p> Tag:  <? echo $singleList['tag']; ?> </p>

    <a href="index.php"> &larr;Home </a>

    <?php include_once("template/searchform.php"); ?>

  </body>

</html>

<?php

  } else {
    header('Location: index.php');
    exit();
  }

?>
