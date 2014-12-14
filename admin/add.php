<?php

  include_once('../database/db.php');

    if(isset($_POST['title'], $_POST['content'], $_POST['tag'] )){
    $title = $_POST['title'];
    $content = nl2br($_POST['content']);
    $tag = $_POST['tag'];

   if(empty($title) or empty ($content)) {
      $error = 'All fields are required';
    } else {

      global $pdo;

      $query = $pdo->prepare('INSERT INTO blog (title, content, tag) VALUES (?,?,?)');
      $query->bindValue(1, $title, PDO::PARAM_STR);
      $query->bindValue(2, $content, PDO::PARAM_STR);
      $query->bindValue(3, $tag, PDO::PARAM_STR);

      $query->execute();
      Header('Location: ../index.php');
    }

  }

?>

<html>
  <head>
    <title>Admin :Add Page</title>
  </head>

  <body>
    <div class="container">
      <a href="index.php" id="logo">CMS Admin</a>
      <br />

      <?php if (isset($error)) {
        echo $error;
      }
      ?>

      <h4> add article</h4>
      <form action="add.php" method="post" autocomplete="off">
        <input type="text" name="title" placeholder="title" /> <br />  <br />
        <textarea rows="15" cols="50" placeholder="content" name="content"> </textarea> <br />  <br />
        <input type="text" name="tag" placeholder="tag" /> <br />
        <input type="submit" value="add" />
      </form>


    </div>
  </body>

</html>
