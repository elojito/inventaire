<?php
include 'connect.php';

$id          = $_POST["id"];
$ste         = $_POST["ste"];
$adress      = $_POST["adress"];
$cp          = $_POST["cp"];
$ville       = $_POST["ville"];
$comF         = $_POST["com"];


$requete = $connexion->prepare("UPDATE fournisseurs
SET societe = :ste, adresse = :adress, code_postal = :cp, ville = :ville, commentaireF = :commentaireF WHERE idFournisseur = :id");

$requete->bindParam(':id', $id);
$requete->bindParam(':ste', $ste);
$requete->bindParam(':adress', $adress);
$requete->bindParam(':cp', $cp);
$requete->bindParam(':ville', $ville);
$requete->bindParam(':commentaireF', $comF);


$resultat = $requete->execute(); 


if ($resultat) {
    header("location: pageFournisseurs.php");
    exit;
} else {
    echo "Erreur dans la modification <br />";
}
?>