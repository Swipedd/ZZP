<?php
session_start();
require '../Database/Database.php';
$Connectie = new DBConnectie();
if(isset($_SESSION['ingelogged'])){
    header("location:../Home/Home.php");
}

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
   $email = htmlspecialchars($_POST['email']);
   $wachtwoord = htmlspecialchars($_POST['wachtwoord']);

if($gegevens = $Connectie->Login($email,$wachtwoord) != false){
    $_SESSION['account'] = $gegevens;
    $_SESSION['ingelogged'] = true;
    header('location:../Home/Home.php');
    exit();
}else{
    $message = "Incorrecte gegevens!";
}



}




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - WeBuild</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>
    <form action="" method="POST">
        <h1>Inloggen</h1>
        <b></b>
        <div class="input-container">
            <input type="text" name="email" required>
            <label>Email</label>
        </div>
        <div class="input-container">
            <input type="password" id="password" name="wachtwoord" required>
            <label>Wachtwoord</label>
            
        </div>

        <a href="#">Wachtwoord vergeten?</a>
        <input type="submit" name="submit" value="Inloggen">
        <a href="../Registratie/Registratie.php">Nog geen account?</a>
    </form>
    <button type="button" onclick="togglePassword()" id="togglePassword">Toon</button>
</body>

<script>
function togglePassword() {
    console.log("Toggle password function uitgevoerd");
    const wachtwoord = document.querySelector("#password");
    const knop = document.querySelector("#togglePassword");

    if (wachtwoord.type === "password") {
        wachtwoord.type = "text";
        knop.textContent = "Verberg";
    } else {
        wachtwoord.type = "password";
        knop.textContent = "Toon";
    }
}
</script>
</html>
