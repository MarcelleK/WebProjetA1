<?php

//établissement de la connexion
$connectPdo = new PDO('mysql:host=localhost;dbname=emasso', 'root', '');

//generation mot de passe aléatoire
function randomPassword()
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $passWord = array(); //un tableau
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $passWord[] = $alphabet[$n];
    }
    return implode($passWord); //convertion du tableau en "string"
}


//requête d'insertion (SQL) dans la table adhérent
$pdoLiaison = $connectPdo->prepare('INSERT INTO  adherent  VALUES (NULL, :civilite, :nom, :prenom, :dateNai, :lieuNai, :Metier, :mel, :tel, :adress1, :codp, :vil, :pay, :donnation)');
//on établie la liaison
$pdoLiaison->bindValue(':civilite', $_POST['civilite1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':nom', $_POST['nom1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':prenom', $_POST['prenom1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':dateNai', $_POST['date_naissance1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':lieuNai', $_POST['lieu_naissance1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':Metier', $_POST['profession1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':mel', $_POST['email1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':tel', $_POST['tel1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':adress1', $_POST['adresse'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':codp', $_POST['cp1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':vil', $_POST['ville1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':pay', $_POST['pays1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':donnation', $_POST['don'], PDO::PARAM_STR);


//requête d'insertion (SQL) dans la table authentification
$pdoLiaisonInAuthentification = $connectPdo->prepare('INSERT INTO authentification VALUES (NULL, :email, :motDePasse)');
$pdoLiaisonInAuthentification->bindValue(':email', $_POST['email1'], PDO::PARAM_STR);
$pdoLiaisonInAuthentification->bindValue(':motDePasse', randomPassword(), PDO::PARAM_STR);

//requête pour la connexion des membres
//$pdoConnexion = $connectPdo->prepare('INSERT INTO connexion VALUES (NULL, :login, :motDePasse)');
//$pdoConnexion->bindValue(':login', $_POST['username'], PDO::PARAM_STR);
//$pdoConnexion->bindValue(':motDePasse', $_POST['password'], PDO::PARAM_STR);


//éxecution de la requête
$insertIsOK = $pdoLiaison->execute();
$insertIsOK2 = $pdoLiaisonInAuthentification ->execute();
//$insertIsOK3 = $pdoConnexion->execute();
if ($insertIsOK && $insertIsOK2) {
    $message = 'Votre demande a été prise en compte. Vous recevrez vos identifiant
     de connexion si votre candidature est acceptée.';
} else {
    $message = 'Echec de l\insertion';
}

//if ($insertIsOK3){
//    $message = 'connexion réussi';
//} else{
//    $message = 'échec connexion';
//}
?>

<!doctype html>
<html lang="fr">
<head>
<!-- Titre, logo et feuille de style css -->
    <link rel="icon" href="../img/Logo1.png">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="../css/site.css">
    <title>Récupération de vos données</title>
</head>


<body>
<section class="billboard light">
    <header class="wrapper">
        <a href="#"><img class="logo" src="../img/Logo1.png" alt=""/></a>
        <nav>
		<!-- Entete de liens avec redirection vers les pages -->
            <ul>
                <li><a href="#">A propos de nous</a></li>
                <li><a href="authentification.html" target="Authentification">Se connecter</a></li>
                <li><a href="adhesion.html" target="Adhesion">Adhésion</a></li>
                <li><a href="contactez_nous.html" target="Contact">Contactez nous</a></li>
            </ul>
        </nav>
        <div class="title">
            <h1>EmASso</h1>
            <hr>
        </div>
    </header>
	<!-- Affichage du message d'erreur ou de succès -->
    <div class="shadow"><br><br>
		<table align="center" width="50%" border ="1" cellspacing="1" cellpadding="1">
			<tr>
				<td><div align=center><h3><p><?php echo $message; ?></p></h3> </div></td>
			<tr>
		</table>
    </div>
</section>


</body>

<!-- récuperation du pied de page pour uniformisation -->
<section>
    <footer class="footer">
        <div class="rights">
            <p>© EMASso All Rights Reserved 2019</p>
        </div>

        <nav>
            <ul>
                <li><a href="#">A propos de nous</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Contactez nous</a></li>
            </ul>
        </nav>
    </footer>
</section>
</html>