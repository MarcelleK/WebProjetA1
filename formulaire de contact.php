<?php

//var_dump($_POST);

//établissement de la connexion
$connectPdo = new PDO('mysql:host=localhost;dbname=emasso','root','');

//test pour fichier

//if(!empty($_FILES)){
	//$file_name = $_FILES['justificatif']['name'];
	//$file_extension = strrchr($file_name,".");
	//$file_tmp_name = $_FILES['justificatif']['tmp_name'];
	//$file_dest = 'PiecesJointes'.$file_name;
	//$extensions_autorisees = array('.pdf','.PDF');
	//if(in_array($file_extension, $extensions_autorisees)){
		//if(move_uploaded_file($file_tmp_name, $file_dest)){
			//$req = $db->prepare('INSERT INTO testemma(nomFichier, fileURL) VALUES(?,?)');
			//$req = execute(array($file_name, $file_dest));
			//echo 'Fichier envoyé avec succès';
		//}else{
			//echo "Une erreur est survenue lors de l'envoi du fichier";
		//}
	//}else {echo 'Seuls les fichiers PDF sont autorisés';
	//}
//}

//requête d'insertion (SQL)
$pdoLiaison = $connectPdo->prepare('INSERT INTO  formcontact  VALUES (NULL, :civilite, :nom, :prenom, :dateAdhesion, :tel, :mail, :dateNaissance, :adresse, :ville, :cp, :pays, :partenariat)');

//on établie la liaison
$pdoLiaison->bindValue(':civilite', $_POST['civilite2'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':nom', $_POST['nom2'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':prenom', $_POST['prenom2'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':dateAdhesion', $_POST['date_adhesion2'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':tel', $_POST['tel2'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':mail', $_POST['email2'], PDO::PARAM_STR);
//$pdoLiaison->bindValue(':nomFichier', $_POST['profession1'], PDO::PARAM_STR);
//$pdoLiaison->bindValue(':fileURL', $_POST['profession1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':dateNaissance', $_POST['date_naissance2'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':adresse', $_POST['adesse2'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':ville', $_POST['ville2'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':cp', $_POST['tel2'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':pays', $_POST['pays2'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':partenariat', $_POST['partenariat2'], PDO::PARAM_STR);

//éxecution de la requête
$insertIsOK = $pdoLiaison->execute();

if($insertIsOK){
	$message = 'Le formulaire de contact a été ajouté dans la bdd';
}
else{
	$message = 'Echec de l\insertion';
}
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
<h1>Insertion des contacts</h1>
<p><?php echo $message; ?></p>
</body>

</html>