<?php
//var_dump($_POST);
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
    return implode($passWord); //turn the array into a string
}


//requête d'insertion (SQL) dans la table adhérent
$pdoLiaison = $connectPdo->prepare('INSERT INTO  adherent  VALUES (NULL, :civilite, :nom, :prenom, :dateNai, :lieuNai, :Metier, :mel, :tel, :adress1, :adress2, :adress3, :codp, :vil, :pay, :donnation)');
//on établie la liaison
$pdoLiaison->bindValue(':civilite', $_POST['civilite1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':nom', $_POST['nom1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':prenom', $_POST['prenom1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':dateNai', $_POST['date_naissance1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':lieuNai', $_POST['lieu_naissance1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':Metier', $_POST['profession1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':mel', $_POST['email1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':tel', $_POST['tel1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':adress1', $_POST['adresse1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':adress2', $_POST['adresse2'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':adress3', $_POST['adresse3'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':codp', $_POST['cp1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':vil', $_POST['ville1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':pay', $_POST['pays1'], PDO::PARAM_STR);
$pdoLiaison->bindValue(':donnation', $_POST['don'], PDO::PARAM_STR);


//requête d'insertion (SQL) dans la table authentification
$pdoLiaisonInAuthentification = $connectPdo->prepare('INSERT INTO authentification VALUES (NULL, :email, :motDePasse)');
$pdoLiaisonInAuthentification->bindValue(':email', $_POST['email1'], PDO::PARAM_STR);
$pdoLiaisonInAuthentification->bindValue(':motDePasse', randomPassword(), PDO::PARAM_STR);

//éxecution de la requête
$insertIsOK = $pdoLiaison->execute();
$insertIsOK2 = $pdoLiaisonInAuthentification ->execute();
if ($insertIsOK && $insertIsOK2) {
    $message = 'Le contact a été ajouté dans la bdd! Vous recevrez vos identifiant
     de connexion si votre candidature est acceptée';
} else {
    $message = 'Echec de l\insertion';
}
?>

<!doctype html>
<html lang="fr">
<head>
    <link rel="icon" href="../img/Logo1.png">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Récupération de vos données</title>
</head>
<body>
<h1>Insertion des contacts</h1>
<p><?php echo $message; ?></p>
</body>

</html>
