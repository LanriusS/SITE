<?php
require_once("init.php");
/////////////////////////// AFFICHAGE DU STOCK ///////////////////////////
echo "<table border='1' style='border-collapse: collapse' cellpadding='7'>";
echo "<tr><td colspan='5'>Stock</td></tr>";
echo "<tr><th>Produit</th><th>Référence</th><th>Prix</th><th>Stock</th><th>Valeur total</th><th>Réapprovisionnement</th></tr>";
$resultat = executeRequete("SELECT * FROM iventaireboutique");
while($info = $resultat->fetch_assoc())
{
    echo '<tr>';
    echo '<td>' . $info['nomProduit'] . '</td>';
    echo '<td>' . $info['reference'] . '</td>';
    echo '<td>' . $info['prixUnitaire'] . '</td>';
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
echo "<tr><td colspan='5'>Ventes</td></tr>";
echo "<tr><th>Date</th><th>Produit</th><th>Quantite</th><th>Prix total</th></tr>";
$resultat = executeRequete("SELECT s.nomProduit, SUM(l.quantite) as quantite, v.prixTotal, v.date FROM lignesventesboutique l
        INNER JOIN iventaireboutique s ON l.IdProduit = s.IdProduit
        INNER JOIN ventesboutique v ON l.IdVentesBoutiques = v.IdVentesBoutique");
while($info = $resultat->fetch_assoc())
{
    echo '<tr>';
    echo '<td>' . $info['date'] . '</td>';

    $resultat_plats = executeRequete("SELECT s.nomProduit, l.quantite FROM lignesventesboutique l
            INNER JOIN iventaireboutique s ON l.IdProduit = s.IdProduit
            INNER JOIN ventesboutique v ON l.IdVentesBoutiques = v.IdVentesBoutique
            WHERE v.date = '".$info['date']."'");
    $prods = "";
    while($info_plat = $resultat_plats->fetch_assoc()) {
        $prods .= $info_plat['quantite']."x ".$info_plat['nomProduit']."<br>";
    }
    echo '<td>' . $prods . '</td>';
    echo '<td>' . $info['quantite'] . ' </td>';
    echo '<td>' . $info['prixTotal'] . '</td>';
    echo '</tr>';


}
echo '</table>';

require_once("header.php");

require_once ("footer.php");
