<?php
 $db = mysqli_connect('localhost','root','','emasso')
 or die('Error connecting to MySQL server.');
?>

<html>
 <head>
  <meta charset="utf-8">
 <link rel="icon" href="../img/Logo1.png">
 <link rel="stylesheet" type="text/css" href="../css/site.css">
 </head>
 <body>
 <h1>Bienvenue dans la base de donnée de EMASSO</h1>

<?php
$query2 = "SELECT * FROM authentification";
mysqli_query($db, $query2) or die('Error querying database.');
$result2 = mysqli_query($db, $query2);
$row = mysqli_fetch_array($result2);
while ($row = mysqli_fetch_array($result2)) {
 echo $row['idAuthentification'] . '    ' . $row['email'] . '  : ' . $row['mot_De_Passe'];
}
?>

<?php
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$username = $_POST['username'];
$password = $_POST['password'];
if($name !=''||$email !=''){
echo "<br/><br/><span>Données insérées avec succès...!!</span>";
}
else{
    echo "<p>Connexion réussie <br/> Des champs sont non-renseignés....!!</p>";
    }
}
?>



</body>
</html>