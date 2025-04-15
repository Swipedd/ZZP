<?php
require '../Database/Database.php';
$Connectie = new DBConnectie();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Connectie->addProject($_POST['name'], $_POST['descriptie'], $_POST['tijd']);
    if ($Connectie) {
        echo "Success";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
          $name = htmlspecialchars($_POST['name']);
          $descriptie = htmlspecialchars($_POST['descriptie']);
          $tijd = htmlspecialchars($_POST['tijd']);
          $Connectie->addProject($name, $descriptie, $tijd);
          echo "<p class='success'>Project toegevoegd</p>";
      } catch (\Exception $e) {
        echo "Error: ". $e->getMessage();
        exit();
      }
  }
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Toevoeg.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar">
<ul class="nav-links">
    <li><button><i class="fas fa-home"></i> <a href="home.html">Home</a></button></li>
    <li><button><a href="../../Login/Login.php"><i class="fas fa-user"></i> Login</a></button></li>
    <li><button><i class="fas fa-diagram-project"></i> Projecten</button></li>
    <li><button><a href="../../BoekingPagina/Boeking.php"><i class="fas fa-book"></i> Boek nu</a></button></li>
    <li><button><i class="fas fa-info-circle"></i> Over Ons</button></li>
    <li><button><a href="../../ContactPagina/Contact.php"><i class="fas fa-phone"></i> Contact</a></button></li>
</ul>
</nav>

<div class="form">
<form action="" method="POST">

   <div class="form-gebied">
            <p>Je Project Naam</p>
        <input type="text" name="name" placeholder="naam" required>
        </div>
    <div class="form-gebied">
            <p>Je description</p>
        <input type="text" name="descriptie" placeholder="description" required>
        </div>
        <button type="submit">Toevoegen</button>
        </form>
 </div>

</body>
</html>