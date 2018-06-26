<?php 
include 'header.php'; 
include 'header2Fournisseur.php';
include 'connect.php';

//On récupère la chaîne de charactères puis la détaille en éléments distincts
$chain  = explode(".", $_GET["val"]);
$id     = $chain[0];
$ste    = $chain[1];
$adress = $chain[2];
$cp     = $chain[3];
$ville  = $chain[4];
$com    = $chain[5];
?>
        <h2>Modifier la fiche Article</h2>
            <form class="updateForm" method="post" action="updateFourn.php">
                <fieldset>
                    <legend>Saisissez les nouvelles valeurs de votre fiche fournisseur:</legend>
                    <ul>
                        <li>
                            <label for="id">Enregistrement:</label>
                            <input id="id" name="id" value="<?php echo $id; ?>" readonly />
                        </li>
                        <li>
                            <label for="ste">Société</label>
                            <input id="ste" name="ste" value="<?php echo $ste; ?>" />
                        </li>
                        <li>
                            <label for="adress">Adresse</label>
                            <input id="adress" name="adress" value="<?php echo $adress; ?>" />
                        </li>
                        <li>
                            <label for="cp">Code Postal</label>
                            <input id="cp" name="cp" value="<?php echo $cp; ?>" />                            
                        </li>
                        <li>
                            <label for="ville">Ville</label>
                            <input id="ville" name="ville" value="<?php echo $ville; ?>" />
                        </li>
                        <li>
                            <label for="com">Commentaire</label>
                            <input id="com" name="com" value="<?php echo $com; ?>" />
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