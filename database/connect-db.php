<?php
// Server data
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'actotaldb';
// Connect to DB
try {
    $dbconn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
?>