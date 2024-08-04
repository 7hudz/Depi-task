<?php
  require 'databasepdo.php';
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       

        $name = $_POST['name'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $stmt = $pdo->prepare('INSERT INTO signup (name, password, email, phone) VALUES (?, ?, ?, ?)');
        if ($stmt->execute([$name, $password, $email, $phone])) {
            header('Location: login.php');
            exit;
        } else {
            echo 'Error registering user.';
        }
    }
    ?>


<!DOCTYPE html>
<html>

<head>
    <title>signup</title>
</head>

<body>
    <h2>sigup</h2>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="name" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <label for="tel">phone:</label>
        <input type="tel" id="phone" name="phone" required><br>
        <button type="submit">signup</button>
    </form>
   
</body>

</html>