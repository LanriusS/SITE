<?php
require_once("init.php");
/////////////////////////// AFFICHAGE DU STOCK ///////////////////////////
echo "<table border='1' style='border-collapse: collapse' cellpadding='7'>";
echo "<tr><td colspan='5'>Stock</td></tr>";
echo "<tr><th>Produit</th><th>Prix</th><th>Stock</th><th>Valeur total</th><th>Réapprovisionnement</th></tr>";
$resultat = executeRequete("SELECT * FROM stockresturant");
while($info = $resultat->fetch_assoc())
{
    echo '<tr>';
    echo '<td>' . $info['nomProduit'] . '</td>';
    echo '<td>' . $info['prixAuKilo'] . ' / kg</td>';
    echo '<td>' . $info['stock'] . '</td>';
    echo '<td>' . $info['valeurTotal'] . '</td>';
    if ($info['reapprovisionnement'] == 0) {
        echo '<td>Pas en cours</td>';
    } else {
        echo '<td>En cours</td>';
    }
    echo '</tr>';

}
echo '</table>';
echo "<br>";
echo "<button>Gérer réapprovisionnement</button>";

/////////////////////////// AFFICHAGE DES VENTES ///////////////////////////
echo "<table border='1' style='border-collapse: collapse' cellpadding='7'>";
echo "<tr><td colspan='4'>Ventes</td></tr>";
echo "<tr><th>Date</th><th>Plats</th><th>Quantité</th><th>Prix Total</th></tr>";

$resultat = executeRequete("SELECT DISTINCT v.date, SUM(l.quantite) as quantite, v.prixTotal FROM lignesventesrestaurant l
        INNER JOIN plat s ON l.IdPlat = s.IdPlat
        INNER JOIN ventesrestaurant v ON l.IdVentesRestaurant = v.IdVentesRestaurant
        GROUP BY v.date");

while($info = $resultat->fetch_assoc())
{
    echo '<tr>';
    echo '<td>' . $info['date'] . '</td>';

    // récupérer la liste des plats de chaque vente
    $resultat_plats = executeRequete("SELECT s.nom, l.quantite FROM lignesventesrestaurant l
            INNER JOIN plat s ON l.IdPlat = s.IdPlat
            INNER JOIN ventesrestaurant v ON l.IdVentesRestaurant = v.IdVentesRestaurant
            WHERE v.date = '".$info['date']."'");
    $plats = "";
    while($info_plat = $resultat_plats->fetch_assoc()) {
        $plats .= $info_plat['quantite']."x ".$info_plat['nom']."<br>";
    }
    echo '<td>' . $plats . '</td>';

    echo '<td>' . $info['quantite'] . ' </td>';
    echo '<td>' . $info['prixTotal'] . '</td>';
    echo '</tr>';
}

echo '</table>';

require_once("header.php");

require_once ("footer.php");
