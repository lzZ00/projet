<?php
// ## accés au modéle
include("connexion_bdd.php");
$q=$_GET["q"];
$ma_requete_SQL ="SELECT nom FROM users where nom = '".$q." ';";
$reponse =  $ma_connexion_mysql->query($ma_requete_SQL);
$donnees = $reponse->fetchAll();
?>
<?php
if(empty($donnees)){
    echo 'login ok';
}
else {
    echo 'login exist';
}
?>