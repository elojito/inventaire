<?php
include 'connect.php';
$id = $_GET["id"];

$requete = $connexion->prepare("DELETE FROM produits WHERE idProduits= :idProduits");
$requete->bindParam(':idProduits', $id);
$resultat = $requete->execute();

if ($resultat) {
    header("location: pageProduits.php");
    exit;
} else {
    echo "Erreur dans la suppression <br />";
}
?>
