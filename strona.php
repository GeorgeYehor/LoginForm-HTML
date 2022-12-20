<?php
    session_start();

    $email = $_SESSION["email"];
    $password = $_SESSION["password"];

    $connection = new mysqli('localhost', 'root', '', 'notes');

	if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    
    

    $check = "SELECT * FROM users WHERE email='$email' and password='$password'";
    $result = mysqli_query($connection, $check);

    while($line = mysqli_fetch_array($result)){
        echo "<h2> Hello " . $line['first_name'] . " " . $line['last_name'] . "</h2>";
        $user = $line['email'];
    }
    if(!isset($_SESSION["email"])){
        header("Location: index.html");
    }else{
        
        echo "<a href='logout.php'><button type='button'>Logout</button></a>";
    }

    if(isset($_GET['Add']) && $_GET['description'] != " " && $_GET['date'] != "")
	{   
            $description = $_GET['description'];
            $date = $_GET['date'];
  
            $add = "insert into notes(description, date, user) values('$description','$date', '$user')";
            $add_result = mysqli_query($connection, $add);  

            $_GET['description'] = "";
            $_GET['date'] = "";
            header("Location: strona.php");
    }else{
        $_GET['description'] = "";
        $_GET['date'] = "";
        
    }

	if(isset($_GET['Delete']) && $_GET['id'] != "")
	{
        $id = $_GET['id'];
        
		$delete="DELETE FROM notes WHERE id=$id";
		$delete_result = mysqli_query($connection, $delete);
		header("Location: strona.php");
    }else{
        $_GET['id'] = "";
        
    }

    echo "<form action='strona.php' method='get'>";
        echo "<textarea type='textarea' name='description' rows='4' cols='50'/> </textarea> <br> <input type='date' name='date'/> <br>";
        echo "<input type='submit' name='Add' value='Add'/>";
    echo "</form>";
    $check = "SELECT * FROM notes WHERE user='$user'";
    $notes_result = mysqli_query($connection, $check);
    if (mysqli_num_rows($notes_result)==0) {
        echo "You don't have notes yet";
    }
    while($line = mysqli_fetch_array($notes_result)){
        echo "<form action='strona.php' method='get'>";
            echo "<input type='hidden' name='id' value='".$line['id']."'/>";
            echo $line['date'] . "<br>";
            echo $line['description'] . "<br> <input type='submit' name='Delete' value='Delete'/>" . "<br>";
            echo "<hr>";
        echo "</form>";
    }
    

    mysqli_close($connection);
?>

