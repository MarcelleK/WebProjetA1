
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
</section>

<?php
//établissement de la connexion à la base de donnée.
try
{
	$connectionContact = new PDO('mysql:host=localhost;dbname=emasso','root','');
	$connectionContact->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//afficher les données de la table
	$requete = "SELECT * FROM authentification";
	$infos = $connectionContact->query($requete);

	//création d'un tableau (avec mise en forme css) qui récupère les données présentes dans la BDD php, afin de l'afficher. 
	echo '
		
<style>
  table {
   border-collapse: collapse;
   color: black;
   font-family: monospace;
     } 
  th {
   background-color: lavender;
   color: black;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
 </style>
	
	
	<table align="center" width="70%" border="1" cellpading="5" cellpacing="5">
	<tr>
		<th colspan="14"><h2>Données pour authentification</h2></th>
	</tr>
	<t>
		<th>Id</th>
		<th>E-mail</th>
		<th>Mot de passe</th>
	</t>';
	
	//Champs (libellés identiques) présent dans la table "adherent" de la base de données emasso (pour y insérer les données)
	foreach($infos as $row)
	{
		echo '<tr>
			<td>'.$row["Id"].'</td>
			<td>'.$row["mail"].'</td>
			<td>'.$row["mdp"].'</td>
		</tr>';
	}
	echo '</table>';
	
}
//message d'erreur en cas d'échec
catch(PDOException $error)
{
	$error->getMessage();
}

?>
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

