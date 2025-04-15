<?php
require "../Database/Database.php";
$Connectie = new DBConnectie();


if (isset($_GET['message'])) {
    echo $_GET['message'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Connectie->Boeking($_POST['voornaam'],$_POST['tussenvoegsels'],$_POST['achternaam'],$_POST['email'],$_POST['datum'],$_POST['tijd'],$_POST['klus']);
    if ($Connectie) {
        echo "Success";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="script.js"></script>
    <link rel="stylesheet" href="Boeking.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
</head>
<body>


   <div class="container">
    <div class="container-tijd">
        <h2 class="heading">Tijden Om Te Boeken</h2>
        <h3 class="heading-Dag">Maandag-Vrijdag</h3>
        <p>09:00-20:00</p>
        
        
        <h3 class="heading">Zaterdag En Zondag</h3>
        <p>11:00-18:00</p>
        
        <hr>
        <h4 class="heading-Telefoon">Bel Ons: (+31) 123456</h4>
    </div>

    <div class="container-form">
        <form action="" method="POST">
        <h2 class="heading/2">Reservatie</h2>

        <div class="form-gebied">
            <p>Je Naam</p>
        <input type="text" name="name" placeholder="naam" require>
        </div>
        <div class="form-gebied">
            <p>Je Achternaam</p>
        <input type="text" name="Achternaam" placeholder="Achternaam" require>
        </div>
        <div class="form-gebied">
            <p>Je E-mail</p>
        <input type="text" name="email" placeholder="E-mail" require>
        </div>
        <div class="form-gebied">
            <p>Selecteer Datum</p>
            <input type="date" placeholder="Kies een datum" required>
        </div>
        <div class="form-gebied">
            <p>Selecteer Tijd</p>
            <input type="time" placeholder="Kies een tijdstip" required>
        </div>
        <div class="form-gebied">
            <p>Wat Is De Klus</p>
        <select name="select" id="#">
            <option value="#">Timmeren</option>
            <option value="#">Schilderen</option>
            <option value="#">meeten</option>
            <option value="#">vloer leggen</option>
            <option value="#">stukken</option>
        </select>
        </div>

        <button class="btn"><a href="../BoekingPagina/confirm.php">Verzenden</button>
        </form>
    </div>
   </div>

</body>
</html>