<?php
include 'header.php';
include 'header2Fournisseur.php';
include 'connect.php';
?>
    <h2>Choisissez la fiche à modifier</h2>
    <form class="single" method="GET" action="pageFournisseursUpdate.php">
        <fieldset>
            <ul>
                <li>
                    <label for="val">Fiche Fournisseur</label>
                    <select name="val">
                        <?php include 'connect.php';
                            $requete  = "SELECT * FROM fournisseurs ORDER BY societe";
                            $resultat = $connexion->query($requete);
                            $liste = $resultat->fetchAll(PDO::FETCH_OBJ);   

                            foreach($liste as $element){
                                $valeur = $element->idFournisseur . "." . $element->societe . "." . $element->adresse . "." . $element->code_postal . "." . $element->ville . "." . $element->commentaireF;
                                echo "<option value='".$valeur."'>";
                                echo $element->societe . " ";
                                echo $element->adresse . " ";
                                echo $element->code_postal . " ";
                                echo $element->ville . " ";
                                echo $element->commentaireF;
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