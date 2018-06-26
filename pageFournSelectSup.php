<?php
include 'header.php';
include 'header2Fournisseur.php';
include 'connect.php';
?>
    <h2>Choisissez la fiche à supprimer</h2>
    <form class="single" action="suppressFourn.php" method="GET">
        <fieldset>
            <ul>
                <li>
                    <label for="id">Fiche Fournisseur</label>
                    <select name="id">
                        <?php include 'connect.php';
                            $requete  = "SELECT * FROM fournisseurs ORDER BY societe";
                            $resultat = $connexion->query($requete);
                            $liste = $resultat->fetchAll(PDO::FETCH_OBJ);   

                            foreach($liste as $element){
                                $id     = $element->idProduits;
                                echo "<option value='".$id."'>";
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
            <button type="submit">Supprimer</button>
        </fieldset>
    </form>
<?php include 'footer.php'; ?>