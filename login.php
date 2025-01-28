<?php
session_start();
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username= '$username' AND password='$password'";
    $result = $conn->query($sql);

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    $_SESSION['username'] = $user['username'];
    header('location: index.php');
    exit;
} else {
    $error = "Username atau Password salah!";
}
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) echo "<P style='color:red;'>$error</P>";?>
    <form action=""method= "POST">
        <label for="username">Username:</label>
        <input type="text" name= "username" required><br>
        <label for="password">Password:</label>
        <input type="password" name= "password" required><br>
        <button type="submit" name= "submit">Login</button>
    </form>
    
</body>
</html>
