<?php
include 'connect.php';

//Récupération des données envoyées par le formulaire d'ajout
$ste         = $_POST["ste"];
$adress      = $_POST["adress"];
$cp          = $_POST["cp"];
$ville       = $_POST["ville"];
$commentaireF = $_POST["commentaire"];

//Insertion dans la BDD
$requete = $connexion->prepare("INSERT INTO fournisseurs (societe, adresse, code_postal, ville, commentaireF)
                                VALUES(:ste,:adress, :cp, :ville, :commentaireF)");
$requete->bindParam(':ste', $ste);
$requete->bindParam(':adress', $adress);
$requete->bindParam(':cp', $cp);
$requete->bindParam(':ville', $ville);
$requete->bindParam(':commentaireF', $commentaireF);
$resultat = $requete->execute();

if ($resultat) {
    header("location: pageFournisseurs.php");
    exit;
} else {
    echo "Erreur dans l'ajout";
}
?>