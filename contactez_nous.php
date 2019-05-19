<?php

//var_dump($_POST);

//établissement de la connexion
$connectPdo1 = new PDO('mysql:host=localhost;dbname=emasso','root','');

//requête d'insertion (SQL)
$pdoLiaison1 = $connectPdo1->prepare('INSERT INTO  formcontact  VALUES (NULL, :civilite, :nom, :prenom, :dateAd, :tel, :mail, :dateNai, :adresse, :ville, :cpp, :pay, :partena)');

//on établie la liaison
$pdoLiaison1->bindValue(':civilite', $_POST['civilite2'], PDO::PARAM_STR);
$pdoLiaison1->bindValue(':nom', $_POST['nom2'], PDO::PARAM_STR);
$pdoLiaison1->bindValue(':prenom', $_POST['prenom2'], PDO::PARAM_STR);
$pdoLiaison1->bindValue(':dateAd', $_POST['date_adhesion2'], PDO::PARAM_STR);
$pdoLiaison1->bindValue(':tel', $_POST['telephone2'], PDO::PARAM_STR);
$pdoLiaison1->bindValue(':mail', $_POST['email2'], PDO::PARAM_STR);
$pdoLiaison1->bindValue(':dateNai', $_POST['date_naissance2'], PDO::PARAM_STR);
$pdoLiaison1->bindValue(':adresse', $_POST['adresse22'], PDO::PARAM_STR);
$pdoLiaison1->bindValue(':ville', $_POST['ville2'], PDO::PARAM_STR);
$pdoLiaison1->bindValue(':cpp', $_POST['code_postal'], PDO::PARAM_STR);
$pdoLiaison1->bindValue(':pay', $_POST['pays2'], PDO::PARAM_STR);
$pdoLiaison1->bindValue(':partena', $_POST['partenaire'], PDO::PARAM_STR);

//éxecution de la requête
$insertIsOK = $pdoLiaison1->execute();
//affichage de message d'erreur ou de succès
if($insertIsOK){
	$message = 'Votre requête a bien été prise en compte. ';
}
else{
	$message = 'Echec, veuillez réiterer votre demande.';
}
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