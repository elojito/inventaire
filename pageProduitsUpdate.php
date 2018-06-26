<?php
include 'header.php';
include 'header2Produits.php';
include 'connect.php';

$chain = explode(',', $_GET['val']);
$id    = $chain[0];
$ref   = $chain[1];
$nom   = $chain[2];
$ste   = $chain[3];
$qu    = $chain[4];
$com   = $chain[5];
?>
            <h2>Modifier la fiche Article</h2>
            <form class="updateForm"  method="post" action="updateProd.php">
                <fieldset>
                    <legend>Saisissez les nouvelles valeurs de votre fiche article:</legend>
                    <ul>
                        <li>
                            <label for="id">Enregistrement:</label>
                            <input id="id" name="id" value="<?php echo $id; ?>" readonly / >
                        </li>
                        <li>
                            <label for="ref">Référence</label>
                            <input id="ref" name="ref" value="<?php echo $ref; ?>" />
                        </li>
                        <li>
                            <label for="nom">Nom</label>
                            <input id="nom" name="nom" value="<?php echo $nom; ?>" />
                        </li>
                        <li>
                            <label for="ste">Fournisseur</label>
                            <select id="ste" name="ste">
                                    <?php
                                    $requete  = "SELECT * FROM fournisseurs";
                                    $resultat = $connexion->query($requete);
                                    $liste    = $resultat->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($liste as $element) {
                                        $ste = $element["societe"];
                                        echo "<option value='".$ste."'>";
                                        echo $ste;
                                        echo "</option>";
                                        }
                                    ?>
                            </select>
                        </li>
                        <li>
                            <label for="quantite">Quantité</label>
                            <input id="quantite" name="quantite" value="<?php echo $qu; ?>" />
                        </li>
                        <li>
                            <label for="commentaire">Commentaire</label>
                            <input id="commentaire" name="commentaire" value="<?php echo $com; ?>" />
                        </li>
                        <li>
                            <button type="submit">Envoyer</button>
                        </li>
                    </ul>
                </fieldset>
            </form>
            <a href="pageProduits.php">
                <button>Retour</button>
            </a>
<?php include 'footer.php'; ?>