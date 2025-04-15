<?php
require "../Database/Database.php";
$Connectie = new DBConnectie();
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['naam']) && !empty($_POST['email']) && !empty($_POST['bericht'])) {
        $voornaam = htmlspecialchars($_POST['naam']);
        $email = htmlspecialchars($_POST['email']);
        $bericht = htmlspecialchars($_POST['bericht']);
        $result = $db->Contact($voornaam, $email, $bericht);

        if ($result) {
            $success = "Uw bericht is succesvol verzonden. We nemen spoedig contact met u op.";
        } else {
            $error = "Er is een fout opgetreden bij het verzenden van uw bericht. Probeer het later opnieuw.";
        }
    } else {
        $error = "Alle velden zijn verplicht. Vul deze in en probeer het opnieuw.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactPagina</title>
    <link rel="stylesheet" type = "text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="Contact.css">
</head>
<body>
<div class="Contact">
    <h1>Contact Us</h1>
    <form class="ContactForm">
        <div class="inputBox">
            <h5>Name</h5>
            <input type="text" name="naam" placeholder="Enter your name" required>
        </div>
        <div class="inputBox">
            <h5>Email</h5>
            <input type="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="inputBox">
            <h5>Message</h5>
            <textarea name="bericht" placeholder=" Enter your message " required></textarea>
            <a href="../HomePagina/Klant/Home.php" class="button">Submit</a>

        </div> 

    <div class="Information">
        <div>
            <h4><i class="fas fa-map-marker-alt"></i> Address</h4>
            <p>Fraijlemaborg 135</p>
            <p>1102 CV Amsterdam</p>
        </div>
        <div>
            <h4><i class="fas fa-phone"></i> Phone</h4>
            <p>020 579 1111</p>
        </div>
        <div>
            <h4><i class="fas fa-envelope"></i> Email</h4>
            <p>webuild@gmail.com</p>
        </div>
    </div>
</div>
</body>
</html>