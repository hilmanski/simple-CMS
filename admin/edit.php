<?php

  include_once('../database/blog.php');

  $blogList = new Blog;


  if(isset($_POST['title'], $_POST['content'], $_POST['tag'] )){
    $title = $_POST['title'];
    $content = nl2br($_POST['content']);
    $tag = $_POST['tag'];
    $id= $_GET['id'];

    if(empty($title) or empty ($content)) {
      $error = 'All fields are required';
    } else {

      //still cannot combined get and post

      $query = $pdo->prepare("UPDATE blog SET title = ?,content = ?,tag = ? WHERE id = ?");
      $query->bindValue(1, $title, PDO::PARAM_STR);
      $query->bindValue(2, $content, PDO::PARAM_STR);
      $query->bindValue(3, $tag, PDO::PARAM_STR);
      $query->bindValue(4, $id, PDO::PARAM_INT);

      $query->execute();

      Header('Location: ../index.php');

    }
  }


  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $singleList = $blogList->fetch_single($id);


?>


<html>
<head>
  <title>Admin :Edit Page</title>
</head>

<body>
  <div class="container">
    <a href="index.php" id="logo">CMS Admin</a>
    <br />


    <h4> add article</h4>
    <form action="edit.php?id=<?php echo $singleList['id'] ?>" method="post" autocomplete="off">
      <input type="text" name="title" placeholder="title" value="<?php echo $singleList['title'] ?>"/> <br />  <br />
      <textarea rows="15" cols="50" placeholder="content" name="content">
        <?php echo $singleList['content'] ?>
      </textarea> <br />  <br />
      <input type="text" name="tag" placeholder="tag" value="<?php echo $singleList['tag'] ?>"/> <br />
      <input type="submit" value="Edit" />
    </form>


  </div>
</body>

</html>


<?php

} else {
  header('Location: ../index.php');
  exit();
}


?>
