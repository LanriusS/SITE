<?php require_once("init.php");?>


<link rel="stylesheet" type="text/css" href="css/index.css" />
<h1 id="title">PROJET 4E</h1>

<h2 class="titre">Groupe 1C</h2>

<form method="post" action="">
    <div class="co">
		<p class="connection">Connexion</p>
		<div>
			<label for="id">Identifiant :</label>
			<input type="text" id="id" name="id">
		</div>

		<div>
			<label for="pass">Mot de passe</label>
			<input type="password" id="password" name="password" minlength="5" required>
		</div>

		<input type="submit" value="Se connecter" id="envoie">
	</div>
</form>

<?php
if(EstConnecte() || EstConnecteEtEstAdmin())
{
    header('Location: accueil.php');
    exit();

}

$contenu = '';
if($_POST) {
    $resultat = executeRequete("SELECT * FROM Connexion WHERE identifiantConnexion = '$_POST[id]'");
    if ($resultat->num_rows != 0) {
        // $contenu .=  '<div style="background:green">pseudo connu!</div>';
        $employe = $resultat->fetch_assoc();
        if ($employe['motDePasse'] == $_POST['password']) {
            //$contenu .= '<div class="validation">mdp connu!</div>';
            foreach ($employe as $indice => $element) {
                if ($indice != 'password') {
                    $_SESSION['membre'][$indice] = $element;
                }
            }
                header('Location: accueil.php');
        } else {
            $contenu .= '<div class="erreur">Erreur de MDP</div>';
            echo $contenu;
        }
    } else {
        $contenu .= '<div class="erreur">Erreur d identifiant</div>';
        echo $contenu;
    }
}

require_once("footer.php");


?>
