<?php include 'connect.php';

$ste = $_POST["ste"];
$requete = $connexion->prepare("SELECT idFournisseur FROM fournisseurs WHERE societe = :societe");
$requete->bindParam(':societe', $ste);
$resultat = $requete->execute();
while ($row = $requete->fetch(PDO::FETCH_OBJ)) {
    $idF = $row->idFournisseur; //le row retourné correspond à l'idFournisseur du $ste
}

$id  = $_POST["id"];
$ref = $_POST["ref"];
$nom = $_POST["nom"];
$qu  = $_POST["quantite"];
$comP = $_POST["commentaire"];

$rqt = $connexion->prepare("UPDATE produits 
                            SET ref = :ref, nom = :nom, idFournisseur = :idF, quantite = :qu, commentaireP = :comP 
                            WHERE idProduits = :idP");

$rqt->bindParam(':ref', $ref);
$rqt->bindParam(':nom', $nom);
$rqt->bindParam(':idF', $idF, PDO::PARAM_INT);
$rqt->bindParam(':qu', $qu, PDO::PARAM_INT);
$rqt->bindParam(':comP', $comP);
$rqt->bindParam(':idP', $id);

$rslt = $rqt->execute();

if ($rslt) {
    header("location: pageProduits.php");
    exit;
} 
else {
    echo "Erreur dans la modification <br />";
}
?>