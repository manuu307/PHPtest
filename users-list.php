<?php
  include('./database/connect-db.php');
//Get users from DB
  $sql = "SELECT * from users ORDER BY id DESC";
  $result = $dbconn->prepare($sql);
  if ($result-> execute()) {
    $message = 'User succesfully creted';
} else {
    $message = 'It has been an error creating this user';
}
//Create User's JSON
  $json = array();
  while($row = $result ->fetch()) {
    $json[] = array(
      'email' => $row['email'],
      'name' => $row['name'],
      'phone' => $row['phone'],
      'date' => $row['date']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>