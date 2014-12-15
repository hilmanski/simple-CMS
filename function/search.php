<?php

if(isset($_POST['searchVal'])) {
  $searchq = $_POST['searchVal'];
  //replace the first argument with second(blank)
  $searchq = preg_replace("#[^0-9a-z]#i","", $searchq);

  $query = mysql_query("SELECT * FROM blog WHERE title LIKE '%$searchq%'
    OR lastname LIKE '%$searchq%' ")or die("couldn't search");

    $count = mysql_num_rows($query);

    if($count == 0){
      $output = 'nothing found!';
    }else {

      while($row = mysql_fetch_array($query)) {
        $fname = $row['firstname'];
        $lname = $row['lastname'];
        $id = $row['id'];

        $output .= '<div>'.$fname.' '.$lname.'</div>';
      }
    }
}

  echo($output);

?>
