<?php
session_start();
include("db.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST ["username"];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $message = $conn ->query("INSERT INTO users (username, password) VALUES ('$username','$password')")
    ? "REGISTERED SUCCESSFULLY" : "FAILED" . $conn -> error;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
</head>

<body>
    
    <h1>REGISTER</h1>
    <?php if (isset($message)) echo "<p>$message</p>";?>
    <form method = "post">
        Username:<input type="text" name="username" required> 
        Password:<input type="password" name="password" required>
        <input type="submit" value="REGISTER">
    </form>

    <form action="login.php">
        <input type = "submit" value="LOGIN">
    </form>

</body>
</html>