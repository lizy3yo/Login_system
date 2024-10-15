<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($result && $user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $message = "WELCOME " . $username;
            header("Location: home.php");
            exit();
        } else {
            $message = "Incorrect Password";
        }
        } else {
        $message = "Username not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($message)) echo "<p>$message</p>";?>
    <form method = "post" action="">
        Username:<input type="text" name="username" required> 
        Password:<input type="password" name="password" required>
        <input type="submit" value="LOGIN">
    </form>
    <form action="register.php">
        <input type = "submit" value="REGISTER">
    </form>
</body>
</html>