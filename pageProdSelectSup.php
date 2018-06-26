<?php
include 'header.php';
include 'header2Produits.php';
include 'connect.php';
?>
    <h2>Choisissez la fiche à supprimer</h2>
    <form class="single" action="suppressProd.php" method="GET">
        <fieldset>
            <ul>
                <li>
                    <label for="id">Fiche Article</label>
                    <select name="id">
                        <?php include 'connect.php';
                            $requete  = "SELECT * FROM produits p, fournisseurs f
                            WHERE p.idFournisseur = f.idFournisseur
                            ORDER BY p.nom";
                            $resultat = $connexion->query($requete);
                            $liste = $resultat->fetchAll(PDO::FETCH_OBJ);   

                            foreach($liste as $element){
                                $id     = $element->idProduits;
                                echo "<option value='".$id."'>";
                                echo $element->ref . " ";
                                echo $element->nom . " ";
                                echo $element->societe . " ";
                                echo $element->quantite . " ";
                                echo $element->commentaire;
                                echo "</option>";
                            }
                        ?>
                    </select>
                </li> 
            </ul>
            <button type="submit">Supprimer</button>
        </fieldset>
    </form>
<?php include 'footer.php'; ?>