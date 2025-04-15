<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestelling Animatie</title>
    <link rel="stylesheet" href="confirm.css">
</head>
<body>
    <div class="container">
        <h1>Bedankt voor uw vertrouwen!</h1>
        <div id="animation">
            <div class="road">
                <div class="package-on-road">
                    <div class="package-detail"></div>
                </div>
                <div class="truck">
                    <div class="truck-body">
                        <div class="trailer">
                            <div class="loading-space">www.WeBuild.nl</div>
                        </div>
                        <div class="cab">
                            <div class="grille"></div>
                            <div class="headlight left-headlight"></div>
                            <div class="headlight right-headlight"></div>
                            <div class="window"></div>
                        </div>
                    </div>
                    <div class="wheel front-wheel"></div>
                    <div class="wheel back-wheel"></div>
                </div>
            </div>
        </div>
        <div id="redirect-container" style="display: none; text-align: center; margin-top: 20px;">
            <button id="redirect-button" style="padding: 10px 20px; font-size: 16px; cursor: pointer;">
                Terug naar Home
            </button>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const animationDiv = document.getElementById("animation");
            const truck = document.querySelector(".truck");
            const packageOnRoad = document.querySelector(".package-on-road");
            const redirectContainer = document.getElementById("redirect-container");
            const redirectButton = document.getElementById("redirect-button");

            
            animationDiv.style.display = "block";

            setTimeout(() => {
                packageOnRoad.style.animation = "pickUpPackage 1s forwards";
            }, 500);

            truck.style.animation = "drive 5s ease-in-out forwards";

            setTimeout(() => {
                animationDiv.style.display = "none";
                redirectContainer.style.display = "block";
            }, 2700);

            
            redirectButton.addEventListener("click", () => {
                window.location.href = "../HomePagina../Klant/Home.php"; 
            });
        });
    </script>
</body>
</html>
