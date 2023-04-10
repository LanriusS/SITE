<?php
function executeRequete($req)
{
    global $mysqli;
    $resultat = $mysqli->query($req);
    if(!$resultat) //
    {
        die("Erreur sur la requete sql.<br>Message : " . $mysqli->error . "<br>Code: " . $req);
    }
    return $resultat; //
}

function EstConnecte()
{
    if(!isset($_SESSION['connexion'])) return false;
    else return true;
}

//------------------------------------
function EstConnecteEtEstAdmin()
{
    if(EstConnecte() && $_SESSION['connexion']['gerant'] == 1) return true;
    else return false;
}