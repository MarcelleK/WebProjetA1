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
$pdoLiaison = $connectPdo->prepare('INSERT INTO  contactadhesion  VALUES (NULL, :civilite, :nom, :prenom, :dateNai, :lieuNai, :Metier, :mel, :tel, :adress1, :adress2, :adress3, :codp, :vil, :pay, :donnation)');

//on établie la liaison
$pdoLiaison->bindValue(':civilite', $_POST['civilite1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':nom', $_POST['nom1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':prenom', $_POST['prenom1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':dateNai', $_POST['date_naissance1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':lieuNai', $_POST['lieu_naissance1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':Metier', $_POST['profession1'], PDO::PARAM_STR);
//$pdoLiaison->bindValue(':nomFichier', $_POST['profession1'], PDO::PARAM_STR);
//$pdoLiaison->bindValue(':fileURL', $_POST['profession1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':mel', $_POST['email1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':tel', $_POST['tel1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':adress1', $_POST['adresse1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':adress2', $_POST['adresse2'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':adress3', $_POST['adresse3'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':codp', $_POST['cp1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':vil', $_POST['ville1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':pay', $_POST['pays1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':donnation', $_POST['don'], PDO::PARAM_STR);

//éxecution de la requête
$insertIsOK = $pdoLiaison->execute();

if($insertIsOK){
	$message = 'Le contact a été ajouté dans la bdd';
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