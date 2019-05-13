<?php
//var_dump($_POST);
//établissement de la connexion
$objetPdo = new PDO('mysql:host=localhost;dbname=emasso','root','');
//requête d'insertion (SQL)
$pdoStat = $objetPdo->prepare('INSERT INTO  testemma  VALUES (NULL, :civilite, :nom, :prenom, :dateNai, :lieuNai, :Metier, :mel, :tel)');
//on établie la liaison
$pdoStat->bindValue(':civilite', $_POST['civilite1'], PDO::PARAM_STR);
$pdoStat->bindValue(':nom', $_POST['nom1'], PDO::PARAM_STR);
$pdoStat->bindValue(':prenom', $_POST['prenom1'], PDO::PARAM_STR);
$pdoStat->bindValue(':dateNai', $_POST['date_naissance1'], PDO::PARAM_STR);
$pdoStat->bindValue(':lieuNai', $_POST['lieu_naissance1'], PDO::PARAM_STR);
$pdoStat->bindValue(':Metier', $_POST['profession1'], PDO::PARAM_STR);
$pdoStat->bindValue(':mel', $_POST['email1'], PDO::PARAM_STR);
$pdoStat->bindValue(':tel', $_POST['tel1'], PDO::PARAM_STR);
//éxecution de la requête
$insertIsOK = $pdoStat->execute();
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