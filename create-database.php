<?php 
  require './database/connect-db.php';
  // Connect to MYSQL
    try {
        $conn = new PDO("mysql:host=$server", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE IF NOT EXISTS $database";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Database created successfully<br>";
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
      
      try {
        // sql to create table
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(30) NOT NULL,
            name VARCHAR(30) NOT NULL,
            phone INT(30) NOT NULL,
            date VARCHAR(30) NOT NULL)";
      
        // use exec() because no results are returned
        $dbconn->exec($sql);
        echo "Table users created successfully";
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
?>  