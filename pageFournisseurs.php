<?php 
include 'header.php';
include 'header2Fournisseur.php';
include 'connect.php';
?>
    <div id="pageFournisseurs">
        <h2>Gestion des Stocks - Fournisseurs</h2>
        <div class="conteneur">
            <form class="left" id="formAjouterFournisseur" name="formAjouterFournisseur" method="post" action="addFourn.php">
                <fieldset>
                    <legend>Ajouter un fournisseur:</legend>
                    <ul>
                        <li>
                            <label for="ste">Société</label>
                            <input id="ste" name="ste" /> </li>
                        <li>
                            <label for="adress">Adresse</label>
                            <input id="adress" name="adress" /> </li>
                        <li>
                            <label for="cp">Code Postal</label>
                            <input id="cp" name="cp" /> </li>
                        <li>
                            <label for="ville">Ville</label>
                            <input id="ville" name="ville" /> </li>
                        <li>
                            <label for="commentaire">Commentaire</label>
                            <input id="commentaire" name="commentaire" /> </li>
                        <li>
                            <button type="submit">Envoyer</button>
                        </li>
                    </ul>
                </fieldset>
            </form>
            <div class="right">
                <?php //Récupération de la base de données
                $requete  = "SELECT * FROM fournisseurs ORDER BY societe";
                $resultat = $connexion->query($requete);
                $liste    = $resultat->fetchAll(PDO::FETCH_OBJ);
            ?>
                    <table> <!-- Création d'un tableau pour l'affichage de la BDD -->
                        <caption>Contenu de la table fournisseurs</caption>
                        <tr>
                            <th>Société</th>
                            <th>Adresse</th>
                            <th>Code Postal</th>
                            <th>Ville</th>
                            <th>Commentaire</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                        <?php 
                        foreach ($liste as $element) {
                            //Création d'une chaîne de charactères d'une ligne BDD
                            $valeur = $element->idFournisseur . "." . $element->societe . "." . $element->adresse . "." . $element->code_postal . "." . $element->ville . "." . $element->commentaireF;
                            //Stockage de l'id de la ligne en variable
                            $id = $element->idFournisseur;
                            //Affichage de la BDD ligne par ligne
                            echo "<tr><td>" . $element->societe . "</td>";
                            echo "<td>" . $element->adresse . "</td>";
                            echo "<td>" . $element->code_postal . "</td>";
                            echo "<td>" . $element->ville . "</td>";
                            echo "<td>" . $element->commentaireF . "</td>";
                            echo "<td><a href='pageFournisseursUpdate.php?val=$valeur'><img src='pencil.png'/></a></td>";
                            echo "<td><a href='suppressFourn.php?id=$id'><img src='bin.png' /></a></td></tr>";
                        }
                        ?>
                    </table>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>