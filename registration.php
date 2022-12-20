<?php

    session_start();
    
    if(!isset($_SESSION["email"])){
        header("Location: index.html");
    }

    $connection = new mysqli('localhost', 'root', '', 'notes');

	if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["registr_email"];
        $password = $_POST["registr_password"];
 
    $check = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";
    $result = mysqli_query($connection, $check);

    
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;
    header("Location: strona.php");
    
    
    
?>