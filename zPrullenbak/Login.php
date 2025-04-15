<?php
require "../Database/DatabaseKlant.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new User();
    $result = $user->login($_POST['email']);
    if ($result && password_verify($_POST['password'], $result['password'])) {
        echo "ingelogd!";
    } else {
        echo "Ongeldig email of wachtwoord!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>
    <nav>
    
    </nav>
<div class="box">
<form method="POST">
    <h1>Login</h1>
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input  href="#"type="submit" >
        <a href="#">Wachtwoord Vergeten</a>
    </form>
</div>
<footer>
    Copyright @2024: Gemaakt door 3D
</footer>
</body>
</html>