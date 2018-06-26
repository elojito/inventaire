<?php include 'connect.php';
$id=$_GET["id"];

$requete=$connexion->prepare("DELETE FROM fournisseurs WHERE idFournisseur= :idFournisseur");
$requete->bindParam(':idFournisseur', $id);
$resultat = $requete->execute();

if($resultat){
    header("location: pageFournisseurs.php");
    exit;
}
else{
    echo "Erreur dans la suppression <br />";
}
?>
