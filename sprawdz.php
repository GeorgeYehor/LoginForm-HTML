<?php

    session_start();

    if(!isset($_SESSION["email"])){
        header("Location: index.html");
    }

    $connection = new mysqli('localhost', 'root', '', 'notes');

	if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    
        $email = $_POST["email"];
        $password = $_POST["password"];
 
    $check = "SELECT * FROM users WHERE email='$email' and password='$password'";
    $result = mysqli_query($connection, $check);

    if (mysqli_num_rows($result)==0) {
        echo "Your not registered yet";
       
    }
    else{
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        header("Location: strona.php");
    }
    
    
?>