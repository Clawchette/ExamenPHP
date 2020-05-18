<?php require_once("inc/head.inc.php"); 
require_once("inc/identification.inc.php");

if($admin=="active"){ ?>

    <div class="starter-template">

        <br><br><br><h2>Modification de ma présentation</h2>
        <!-- La présentation étant unique, elle ne peut être que modifiée -->

        <?php $result = $pdo->query("SELECT * FROM apropos WHERE id_apropos='1'"); 
        $modif = $result->fetch(PDO::FETCH_OBJ)?>
        <!-- ^Cherche le contenu de la base de données -->

        <form method="POST" action="" enctype='multipart/form-data'>

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="texte" class="form-control" id="prenom" name="prenom" maxlength = "20" value="<?php echo $modif->prenom; ?>">
            </div>

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="texte" class="form-control" id="nom" name="nom" maxlength = "20" value="<?php echo $modif->nom; ?>">
            </div>



            <div class="form-group">
                <label for="rue">Rue</label>
                <input type="texte" class="form-control" id="rue" name="rue" maxlength = "40" value="<?php echo $modif->rue; ?>">
            </div>

            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="texte" class="form-control" id="ville" name="ville" maxlength = "20" value="<?php echo $modif->ville; ?>">
            </div>

            <div class="form-group">
                <label for="codepostal">Code Postal</label>
                <input type="texte" class="form-control" id="codepostal" name="codepostal" maxlength = "10" value="<?php echo $modif->codepostal; ?>">
            </div>



            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="texte" class="form-control" id="telephone" name="telephone" maxlength = "14" value="<?php echo $modif->telephone; ?>">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="texte" class="form-control" id="email" name="email" maxlength = "50" value="<?php echo $modif->email; ?>">
            </div>



            <div class="form-group">
                <label for="description">Description</label>
                <textarea rows="10" class="form-control" id="description" name="description"><?php echo $modif->description; ?></textarea>
            </div>



            <div class="form-group">
                <label for="img">Chemin vers la photo</label>
                <input type="file" class="form-control-file" id="img" name="img[]">
            </div>



            <div class="form-group">
                <label for="lienlinkedin">Lien LinkedIn</label>
                <input type="texte" class="form-control" id="lienlinkedin" name="lienlinkedin" maxlength = "100" value="<?php echo $modif->lienlinkedin; ?>">
            </div>

            <div class="form-group">
                <label for="liengithub">Lien Github</label>
                <input type="texte" class="form-control" id="liengithub" name="liengithub" maxlength = "100" value="<?php echo $modif->liengithub; ?>">
            </div>

            <div class="form-group">
                <label for="lientwitter">Lien Twitter</label>
                <input type="texte" class="form-control" id="lientwitter" name="lientwitter" maxlength = "100" value="<?php echo $modif->lientwitter; ?>">
            </div>

            <div class="form-group">
                <label for="lienfacebook">Lien Facebook</label>
                <input type="texte" class="form-control" id="lienfacebook" name="lienfacebook" maxlength = "100" value="<?php echo $modif->lienfacebook; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Modifier les intérêts</button>

        </form>
        <br>
    </div>

    <?php
    if(!empty($_POST)){

        $name = "";
        if (!empty($_FILES)) {
            foreach ($_FILES["img"]["error"] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                    $tmp_name = $_FILES["img"]["tmp_name"][$key];
                    $name = basename($_FILES["img"]["name"][$key]);
                    move_uploaded_file($tmp_name, "img/$name");
                }
            }
        }
        // ^Vérifie que le fichier est bon, l'enregistre dans le dossier img/ et enregistre son nom dans $name

        $_POST["prenom"] = htmlentities($_POST["prenom"], ENT_QUOTES);
        $_POST["nom"] = htmlentities($_POST["nom"], ENT_QUOTES);

        $_POST["rue"] = htmlentities($_POST["rue"], ENT_QUOTES);
        $_POST["ville"] = htmlentities($_POST["ville"], ENT_QUOTES);
        $_POST["codepostal"] = htmlentities($_POST["codepostal"], ENT_QUOTES);

        $_POST["telephone"] = htmlentities($_POST["telephone"], ENT_QUOTES);
        $_POST["email"] = htmlentities($_POST["email"], ENT_QUOTES);

        $_POST["description"] = htmlentities($_POST["description"], ENT_QUOTES);
        
        $_POST["lienlinkedin"] = htmlentities($_POST["lienlinkedin"], ENT_QUOTES);
        $_POST["liengithub"] = htmlentities($_POST["liengithub"], ENT_QUOTES);
        $_POST["lientwitter"] = htmlentities($_POST["lientwitter"], ENT_QUOTES);
        $_POST["lienfacebook"] = htmlentities($_POST["lienfacebook"], ENT_QUOTES);
        // ^Vérifie qu'il n'y a pas de code dans les entrées

        $requeteSQL = "UPDATE apropos SET ";
        $requeteSQL .="prenom='$_POST[prenom]', nom='$_POST[nom]', rue='$_POST[rue]', ville='$_POST[ville]', codepostal='$_POST[codepostal]', ";
        $requeteSQL .="telephone='$_POST[telephone]', email='$_POST[email]', description='$_POST[description]', cheminphoto='img/$name', lienlinkedin='$_POST[lienlinkedin]', ";
        $requeteSQL .="liengithub='$_POST[liengithub]', lientwitter='$_POST[lientwitter]', lienfacebook='$_POST[lienfacebook]' ";
        $requeteSQL .="WHERE id_apropos='1'";

        $pdo->exec($requeteSQL);
        //^Enregistre les données dans la base de données
        
    }
}

require_once("inc/footer.inc.php"); ?>