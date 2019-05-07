<?php
 $db = mysqli_connect('localhost','root','','emasso')
 or die('Error connecting to MySQL server.');
?>

<html>
 <head>
 </head>
 <body>
 <h1>PHP connect to MySQL</h1>

<?php
$query = "SELECT idAdherent, Nom, Prenom, Ville FROM adherent";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

while ($row = mysqli_fetch_array($result)) {
 echo $row['idAdherent'] . ' ' . $row['Nom'] . ': ' . $row['Prenom'] . ' ' . $row['Ville'];

}
?>

</body>
</html>