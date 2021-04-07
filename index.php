<?php 
    require './database/connect-db.php';
    $message = '';
    
    if (!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['phone'])) {
        $date = date("d/m/y");
        $sql = "INSERT INTO users (email, name, phone, date) VALUES (:email, :name, :phone, :date)";
        $stmt = $dbconn->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt-> bindParam(':name',$_POST['name']);
        $stmt->bindParam(':phone', $_POST['phone']);
        $stmt->bindParam(':date', $date);

        if ($stmt-> execute()) {
            echo "User succesfully creted";
            $message = 'User succesfully creted';
        } else {
            echo '<script>console.log("It has been an error creating this user")</script>';
            $message = 'It has been an error creating this user';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACtotal</title>
    <!-- Jquery -->
<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
    <!-- Form Validator -->
    <script src="validation.js" type="text/javascript"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
    
</head>
<body onload="fetchUsers()">
<!-- For testing only -->
<!-- <?php if (!empty($message)): ?>
<p><?= $message ?></p>
<?php endif; ?> -->
<div class="logo"><img src="./public/logo.png" alt="Logo" width="200px"></div>
<div class="father fade-in">
<div class="form-div">
<h2>Ingreso de datos:</h2>
<form id="register-form" class="register-form">
        <label for="">Email:</label>
        <input id="email" type="text" name="email">
        <p id="emailprompt"></p><br>
        <label for="">Nombre:</label>
        <input id="name" type="text" name="name">
        <p id="nameprompt"></p><br>
        <label for="">Telefono:</label>
        <input id="phone" type="number" name="phone">
        <p id="phoneprompt"></p><br>
    </form>
    <button onclick="validateForm()">OK</button>
</div>
<div class="line"></div>
<div class="data-div"><h2>Listado de datos:</h2>
<div id="users" class="data-fetched"> <!-- DATA FROM REQUESTS --> </div>
</div>
</div>
</body>
</html>