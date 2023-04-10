<?php
require_once("init.php");
$contenu = '';

/////////////////////////// AFFICHAGE DES MEMBRES ///////////////////////////
echo "<table border='1' style='border-collapse: collapse' cellpadding='7'>";
echo "<tr><td colspan='5'>Membres</td></tr>";
echo "<tr><th>Nom</th><th>Prenom</th><th>Email</th><th>Date creation</th></tr>";
$resultat = executeRequete("SELECT * FROM membreStationService");
while($info = $resultat->fetch_assoc())
{
    echo '<tr>';
    echo '<td>' . $info['nom'] . '</td>';
    echo '<td>' . $info['prenom'] . '</td>';
    echo '<td>' . $info['email'] . '</td>';
    echo '<td>' . $info['dateCreation'] . '</td>';
    echo '</tr>';
}
echo '</table>';
echo "<br>";
echo "<button>Créer carte membre</button>";
echo "<button>Créer carte énergie</button>";

/////////////////////////// AFFICHAGE DU STOCK ///////////////////////////
echo "<table border='1' style='border-collapse: collapse' cellpadding='7'>";
echo "<tr><td colspan='5'>Stock</td></tr>";
echo "<tr><th>Nom énergie</th><th>Prix</th><th>Stock</th><th>Valeur total</th><th>Réapprovisionnement</th></tr>";
$resultat = executeRequete("SELECT * FROM stockStationService");
while($info = $resultat->fetch_assoc())
{
    echo '<tr>';
    echo '<td>' . $info['nomEnergie'] . '</td>';
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
if(EstConnecteEtEstAdmin())
    echo "<button>Gérer réapprovisionnement</button>";

/////////////////////////// AFFICHAGE DES VENTES ///////////////////////////
echo "<table border='1' style='border-collapse: collapse' cellpadding='7'>";
echo "<tr><td colspan='5'>Ventes</td></tr>";
echo "<tr><th>Date</th><th>Energie</th><th>Quantite</th><th>Prix</th></tr>";
$resultat = executeRequete("SELECT s.nomEnergie, l.quantite, v.prixTotal, v.date FROM LignesVentesStationService l
        INNER JOIN StockStationService s ON l.IdEnergie = s.IdEnergie
        INNER JOIN VentesStationService v ON l.IdVentesStationService = v.IdVentesStationService");
while($info = $resultat->fetch_assoc())
{
    echo '<tr>';
    echo '<td>' . $info['date'] . '</td>';
    echo '<td>' . $info['nomEnergie'] . '</td>';
    if ($info['nomEnergie'] != 'Electrique')
        echo '<td>' . $info['quantite'] . ' L</td>';
    else
        echo '<td>' . $info['quantite'] . ' Kw/h</td>';
    echo '<td>' . $info['prixTotal'] . '</td>';
    echo '</tr>';


}
echo '</table>';
require_once("header.php");

require_once ("footer.php");