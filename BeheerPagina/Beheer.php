<?php
require "../Database/Database.php";
$Connectie = new DBConnectie();

// Project toevoegen
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_project'])) {
    $naam = $_POST['naam'];
    $descriptie = $_POST['descriptie'];
    $tijd = $_POST['tijd'];
    
    // Controleer of de method addProject bestaat in $Connectie
    if (method_exists($Connectie, 'addProject')) {
        $Connectie->addProject($naam, $descriptie, $tijd);
    }
    
    header("Location: ../HomePagina/Home.php");
    exit;
}

// Haal projecten op
$query = "SELECT * FROM projecten ORDER BY tijd DESC";
$statement = $Connectie->dbh->prepare($query);
$statement->execute();
$projecten = $statement->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Beheer.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar">
    <div class="logo-container">
        <img src="logo.png" alt="Logo" class="logo hammer">
        <span class="company-name">
            <span style="--i: 1">W</span>
            <span style="--i: 2">e</span>
            <span style="--i: 3">B</span>
            <span style="--i: 4">u</span>
            <span style="--i: 5">i</span>
            <span style="--i: 6">l</span>
            <span style="--i: 7">d</span>
        </span>
    </div>
    <ul class="nav-links">
        <li><button><i class="fas fa-home"></i> <a href="home.html">Home</a></button></li>
        <li><button><a href="../../Login/Login.php"><i class="fas fa-user"></i> Login</a></button></li>
        <li><button><a href="../Registratie//Registratie.php"><i class="fas fa-user"></i> Register</a></button></li>
        <li><button><i class="fas fa-diagram-project"></i> Projecten</button></li>
        <li><button><a href="../../BoekingPagina/Boeking.php"><i class="fas fa-book"></i> Boek nu</a></button></li>
        <li><button><a href="../../ContactPagina/Contact.php"><i class="fas fa-phone"></i> Contact</a></button></li>
    </ul>
</nav>
<div class="container">
    <h1>Overzicht Lopende Projecten</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Beschrijving</th>
                <th>Tijd</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projecten as $project): ?>
                <tr>
                    <td><?= htmlspecialchars($project['naam']) ?></td>
                    <td><?= htmlspecialchars($project['descriptie']) ?></td>
                    <td><?= htmlspecialchars($project['tijd']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="add-project">
        <h2>Project Toevoegen</h2>
        <form method="post" action="">
            <input type="text" name="naam" placeholder="Projectnaam" required>
            <textarea name="descriptie" placeholder="Beschrijving" required></textarea>
            <input type="datetime-local" name="tijd" required>
            <button type="submit" name="add_project">Toevoegen</button>
        </form>
    </div>
</div>
</body>
</html>
=======
    <title>Document</title>
</head>
<body>
    
</body>
</html>
>>>>>>> Stashed changes
