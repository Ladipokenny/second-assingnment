<?php
session_start();
include("users.csv");
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $confirmpassword = $_POST["confirmpassword"];
    $query = $connection->prepare("SELECT * FROM users WHERE email=":email");
    $query->bindParam("email:, $email,PDO::PARAM_STR);
    $query->bindParam("password_hash:, $password_hash,PDO::PARAM_STR);
    $result = $query->execute();
    if ($result) {
        echo "<p class="success">User successfully registered!<?p>";
    } else {
        echo "<p class="error">Something went wrong!</p>";
    }
  }
 }
 ?>



