<?php
include 'header.php';
include 'header2Produits.php';
include 'connect.php';
?>
    <div id="pageProduits">
        <h2>Gestion des Stocks - Produits</h2>
        <div class="conteneur">
            <form class="left" id="formAjouterProduit" name="formAjouterProduit" method="post" action="addProd.php">
                <fieldset>
                    <legend>Ajouter un produit:</legend>
                    <ul>
                        <li>
                            <label for="ref">Référence</label>
                            <input id="ref" name="ref" />
                        </li>
                        <li>
                            <label for="nom">Nom</label>
                            <input id="nom" name="nom" />
                        </li>
                        <li>
                            <label for="ste">Fournisseur</label>
                            <select id="ste" name="ste">
                                <option selected></option>
                                <?php
                                $requete  = "SELECT * FROM fournisseurs";
                                $resultat = $connexion->query($requete);
                                $liste    = $resultat->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($liste as $element) {
                                echo "<option>";
                                echo $element["societe"];
                                echo "</option>";
                                }
                                ?>
                            </select>
                        </li>
                        <li>
                            <label for="quantite">Quantité</label>
                            <input id="quantite" name="quantite" />
                        </li>
                        <li>
                            <label for="commentaire">Commentaire</label>
                            <input id="commentaire" name="commentaire" />
                        </li>
                        <li>
                            <button type="submit">Envoyer</button>
                        </li>
                    </ul>
                </fieldset>
            </form>
            <div class="right">
                <br />
                <?php
                $requete  = "SELECT * FROM produits p, fournisseurs f
                            WHERE p.idFournisseur = f.idFournisseur
                            ORDER BY p.nom";
                $resultat = $connexion->query($requete);
                $liste    = $resultat->fetchAll(PDO::FETCH_OBJ);
                ?>
                    <table>
                        <caption>Contenu de la table Produits</caption>
                        <tr>
                            <th>Ref</th>
                            <th>Nom</th>
                            <th>Fournisseur</th>
                            <th>Quantité</th>
                            <th>Commentaire</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                        <?php
                        foreach ($liste as $element) {
                        $valeur = $element->idProduits . "," . $element->ref . "," . $element->nom . "," . $element->societe . "," . $element->quantite . "," . $element->commentaireP;
                        $id     = $element->idProduits;
                        echo "<tr><td>" . $element->ref . "</td>";
                        echo "<td>" . $element->nom . "</td>";
                        echo "<td>" . $element->societe . "</td>";
                        echo "<td>" . $element->quantite . "</td>";
                        echo "<td>" . $element->commentaireP . "</td>";
                        echo "<td><a href='pageProduitsUpdate.php?val=$valeur'><img src='pencil.png'/></a></td>";
                        echo "<td><a href='suppressProd.php?id=$id'><img src='bin.png' /></a></td></tr>";
                        }
                        ?>
                    </table>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>