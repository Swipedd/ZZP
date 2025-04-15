<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards met Scroll</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="home.css">

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
    <li><button><i class="fas fa-home"></i> <a href="../Klant/Home.php">Home</a></button></li>
    <li><button><a href="../../Login/Login.php"><i class="fas fa-user">login</i> </a></button></li>
    <li><button><a href="../../projecten//projecten.php"><i class="fas fa-diagram-project"></i> Projecten</a></button></li>
    <li><button><a href="../../BoekingPagina/Boeking.php"><i class="fas fa-book"></i> Boek nu</a></button></li>
    <li><button><a href="../../Over Ons//Overons.php" class="fas fa-info-circle"></i> Over Ons</a></button></li>
    <li><button><a href="../../ContactPagina/Contact.php"><i class="fas fa-phone"></i> Contact</a></button></li>
</ul>   

        </ul>   
    </nav>

   
    <div class="scroll-container">
        <button class="scroll-btn" onclick="scrollToCards()">Bekijk Projecten</button>
    </div>

  
    <div class="cards-container" id="cards-section">
        <div class="container">
            <div class="wrapper">
                <div class="banner-image-1"></div>
                <h1>moderne schuur</h1>
               
            </div>
        </div>
        <div class="container">
            <div class="wrapper">
                <div class="banner-image-2"></div>
                <h1>nieuw WeBuild hoofdkantoor</h1>
                
            </div>
        </div>
        <div class="container">
            <div class="wrapper">
                <div class="banner-image-3"></div>
                <h1>onze meubels</h1>
                
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const hammer = document.querySelector('.hammer');
            const companyName = document.querySelector('.company-name');

            if (hammer && companyName) {
                let swingCount = 0;

                const swingHammer = () => {
                    hammer.classList.add('swing');
                    swingCount++;

                    setTimeout(() => {
                        hammer.classList.remove('swing');
                        if (swingCount < 3) {
                            setTimeout(swingHammer, 500);
                        } else {
                            companyName.classList.add('visible');
                        }
                    }, 500);
                };

                swingHammer();
            }
        });
        function scrollToCards() {
            const cardsSection = document.getElementById("cards-section");
            cardsSection.scrollIntoView({ behavior: "smooth" });
        }
    </script>
</body>
</html>
