<?php
session_start();
require "../Database/Database.php";
$Connectie = new DBConnectie();
$message = "";

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){        
    $email = $_POST['email'];
    if(!$Connectie->emailCheck($email)){   
        $leeftijd = $_POST['leeftijd'];
        if($leeftijd < 100 && $leeftijd > 15){        
            $wachtwoord = $_POST['wachtwoord'];
            $herhaal = $_POST['herhaalwachtwoord'];
                if($wachtwoord == $herhaal){
                $voornaam = htmlspecialchars($_POST['voornaam']);
                $tussenvoegsels = htmlspecialchars($_POST['tussenvoegsels']);
                $achternaam = htmlspecialchars($_POST['achternaam']);
                $geslacht = $_POST['geslacht'];
                $telefoonnummer = $_POST['telefoonnummer'];
                $hash_ww = password_hash($wachtwoord, PASSWORD_DEFAULT);
                $bedrijfsnaam = htmlspecialchars($_POST['bedrijfsnaam']);
                $btwnummer = $_POST['btwnummer'];
                $kvknummer = $_POST['kvknummer'];

                $Connectie->Registeer($voornaam,$tussenvoegsels,$achternaam,$leeftijd,$geslacht,$email,$telefoonnummer,$hash_ww,$bedrijfsnaam,$btwnummer,$kvknummer);
                header("Refresh:2; url=../Login/Login.php");
                }else{$message = "<b style='padding: 10px;border: solid 1px;'>Wachtwoorden komen niet overeen.</b>";}
        }else{$message = "<b style='padding: 10px;border: solid 1px;'>Ongeldige leeftijd.</b>";}
        
    }else{$message = "<<b style='padding: 10px;border: solid 1px;'>Deze email is al in ons systeem.</b>";}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="short-cut icon" href="">
    <link rel="stylesheet" href="Registratie.css">
    <title>Registratie - ZZP</title>
    <script></script>
</head>
<body>

    <form action="" method="POST">    
        <h1>Registratie</h1>
        <b><?php if(isset($message)){echo $message;}?></b>
        <a href="../Login/Login.php">Al een account?</a>
        <h2>Persoonlijk</h2>
        <label>*Voornaam:</label>
        <input type="text" name="voornaam" required>
        <label>Tussenvoegsels:</label>
        <input type="text" name="tussenvoegsels">
        <label>*Achternaam:</label>
        <input type="text" name="achternaam" required>
        <label>*Leeftijd:</label>
        <input type="number" name="leeftijd" required>
        <label>*Geslacht:</label>
        <div class="radiobuttons">
        <label><input type="radio" class="man" name="geslacht" value="man" checked>Man</label>
        <label class="vrouwen"><input type="radio" class="vrouw" name="geslacht" value="vrouw">Vrouw</label>
        </div>

        <h2>Beveiliging</h2>
        <label>*Email:</label>
        <input type="email" name="email" required>
        <label>*Telefoonnummer</label>
        <input type="number" name="telefoonnummer" required>
        <label>*Wachtwoord:</label>
        <input type="password" name="wachtwoord" minlength="6" maxlength="255" required>
        <label>*Herhaal:</label>
        <input type="password" name="herhaalwachtwoord" minlength="6" maxlength="255" required>

        <h2>Bedrijf (Optioneel)</h2>
        <label>Bedrijfs Naam:</label>
        <input type="text" name="bedrijfsnaam">
        <label>BTW-Nummer:</label>
        <input type="text" name="btwnummer" maxlength="14">
        <label>KVK-Nummer:</label>
        <input type="text" name="kvknummer" maxlength="8" minlength="8">

        <input type="submit" name="submit" value="Registreer" required>
    </form>
</body>
</html>
