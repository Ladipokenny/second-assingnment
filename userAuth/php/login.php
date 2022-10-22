<?php
    sessionn_start();
require "login.html";
require "dashboard.php";
if(isset($_POST['submit'])){
    $username =$_POST["username"];
loginUser($email, $password);

}

function loginUser($email, $password){
    /* declare the body
        Finish this function to check if username and password 
    from file match that which is passed from the form
    */
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = $connection->prepare("SELECT * FROM usewrs WHERE username="username");
    $query = $connection->prepare("SELECT * FROM users WHERE email=":email");
    $query_>bindParam("email:, $email,PDO::PARAM_STR);
    $query_>bindParam("password_hash:, $password_hash,PDO::PARAM_STR);
    $result = $query->execute();
    $result=$query ->fetch(PDO::FETCH_ASSOC);
    if (!$result){
        echo "<p class="error">Username password combination is wrong!</p>";
    } else {
        if (password_verify($password, $result["password"])){
            $_SESSION["user_id"] = $result["id"];
            echo "<p class="success">Congratulations, you are logged in!</p>';
        }else{
            echo "<p class="error">Username password combination is wrong!</p>";
        }
    }
}

echo "HANDLE THIS PAGE";

