<?php include 'connect.php';    

$requete = $connexion->prepare("SELECT idFournisseur FROM fournisseurs WHERE societe = :societe");
$requete->bindParam(':societe', $ste);
$ste = $_POST["ste"];
$resultat = $requete->execute();
while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $id= $row->idFournisseur;
}


$requete = $connexion->prepare("INSERT INTO produits (ref, nom, idFournisseur, quantite, commentaireP)
VALUES(:ref, :nom, :idFournisseur, :quantite, :commentaireP)");
$requete->bindParam(':ref', $ref);
$requete->bindParam(':nom', $nom);
$requete->bindParam(':idFournisseur', $id);
$requete->bindParam(':quantite', $quantite);
$requete->bindParam(':commentaireP', $commentaireP);


 $ref=   $_POST["ref"];
 $nom=   $_POST["nom"];
 $quantite=   $_POST["quantite"];
 $commentaireP=   $_POST["commentaire"];
   
$resultat = $requete->execute();



if($resultat){
    header("location: pageProduits.php");
    exit;
}
else{
    echo "Erreur dans l'ajout\n";
    echo "\nPDOStatement::errorCode(): ";
    print $requete->errorCode();
    echo "\nPDO::errorInfo():\n";
    print_r($requete->errorInfo());
}


?>