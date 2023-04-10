<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Lucas Schiavetti" />
    <title>R409</title>
    <link href="assets/favicon.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <script defer="defer" src="js/index.js"></script>
</head>
<body>
<header>
    <div class="conteneur">
        <div>

        </div>
        <nav>
            <?php
            if(EstConnecte())
            {
                /*echo '<a class="test"  style="float:left" href="profil.php">Voir votre profil</a>';
                echo '<a class="test"  style="float:left" href="index.php">Accès à la boutique</a>';
                echo '<a class="test"  style="float:left" href="panier.php">Voir votre panier</a>';
                echo '<a class="test" style="float:right" href="connexion.php?action=deconnexion">Se déconnecter</a>';
            */}
            else
            {
                echo '<a class="test"  style="float:right" href="https://erp1c.000webhostapp.com/restaurant.php">Restaurant</a>';
                echo '<a class="test" style="float:right" href="https://erp1c.000webhostapp.com/stationService.php">Station service</a>';
                echo '<a class="test" style="float:left" href="https://erp1c.000webhostapp.com/boutique.php">Boutique</a>';
            }

            ?>
        </nav>
    </div>
</header>
<section>
    <div class="conteneur">
