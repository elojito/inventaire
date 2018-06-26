<?php
include 'header.php';
include 'header2Produits.php';
include 'connect.php';
?>
    <h2>Choisissez la fiche à modifier</h2>
    <form class="single" method="GET" action="pageProduitsUpdate.php">
        <fieldset>
            <ul>
                <li>
                    <label for="val">Fiche Article</label>
                    <select name="val">
                        <?php include 'connect.php';
                            $requete  = "SELECT * FROM produits p, fournisseurs f
                            WHERE p.idFournisseur = f.idFournisseur
                            ORDER BY p.nom";
                            $resultat = $connexion->query($requete);
                            $liste = $resultat->fetchAll(PDO::FETCH_OBJ);   

                            foreach($liste as $element){
                                $valeur = $element->idProduits . "," . $element->ref . "," . $element->nom . "," . $element->societe . "," . $element->quantite . "," . $element->commentaireP;
                                echo "<option value='".$valeur."'>";
                                echo $element->ref . " ";
                                echo $element->nom . " ";
                                echo $element->societe . " ";
                                echo $element->quantite . " ";
                                echo $element->commentaireP;
                                echo "</option>";
                            }
                        ?>
                    </select>
                </li> 
            </ul>
            <button type="submit">Modifier</button>
        </fieldset>
    </form>
<?php include 'footer.php'; ?>