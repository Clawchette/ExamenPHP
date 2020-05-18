<?php require_once("inc/head.inc.php"); 
require_once("inc/identification.inc.php"); 

if($admin=="active"){ ?>?>

    <br><br><br>
    <h2>Education</h2>
    <br>

    <?php if(empty($_GET)){ ?>

        <a href="administration.education.php?choix=ajouter" class="btn btn-primary btn-lg">Ajouter</a>
        <a href="administration.education.php?choix=modifier" class="btn btn-primary btn-lg">Modifier</a>
        <a href="administration.education.php?choix=supprimer" class="btn btn-primary btn-lg">Supprimer</a>

    <?php } 

    else if($_GET["choix"]=="ajouter"){?>

        <!-- ------------------------------------------------------------------------------------------- -->
        <h3>Ajout d'une formation</h3>
        <!-- ------------------------------------------------------------------------------------------- -->

        <br>
        <form method="POST" action="">

            <div class="form-group">
                <label for="ecole">Ecole</label>
                <input type="texte" class="form-control" id="ecole" name="ecole" placeholder="L'école dans laquelle vous avez étudié..." maxlength = "40">
            </div>

            <div class="form-group">
                <label for="periode">Période</label>
                <input type="texte" class="form-control" id="periode" name="periode" placeholder="De <Mois Année> à <Mois Année>" maxlength = "100">
            </div>

            <div class="form-group">
                <label for="formation">Formation</label>
                <input type="texte" class="form-control" id="formation" name="formation" placeholder="Le nom de votre formation..." maxlength = "40">
            </div>

            <div class="form-group">
                <label for="specialisation">Spécialisation</label>
                <input type="texte" class="form-control" id="specialisation" name="specialisation" placeholder="Si vous aviez une spécialisation..." maxlength = "100">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter une formation</button>
            
        </form>

        <br>
        <a href="administration.education.php" class="btn btn-primary">Retour</a>
        <br><br><br>

        <?php if(!empty($_POST)){

            $_POST["ecole"] = htmlentities($_POST["ecole"], ENT_QUOTES);
            $_POST["periode"] = htmlentities($_POST["periode"], ENT_QUOTES);
            $_POST["formation"] = htmlentities($_POST["formation"], ENT_QUOTES);
            $_POST["specialisation"] = htmlentities($_POST["specialisation"], ENT_QUOTES);
            
            $requeteSQL = "INSERT INTO education (ecole, periode, formation, specialisation)";
            $requeteSQL .= " VALUE ('$_POST[ecole]', '$_POST[periode]', '$_POST[formation]', '$_POST[specialisation]')";
            $pdo->exec($requeteSQL);
            header("Location:administration.education.php?choix=ajouter");

        } 
    }


    else if($_GET["choix"]=="modifier"){ ?>

        <!-- ------------------------------------------------------------------------------------------- -->
        <h3>Modification d'une formation</h3>
        <!-- ------------------------------------------------------------------------------------------- -->

        <?php $liste = $pdo->query("SELECT * FROM education"); 

        if(empty($_GET["modif"])){ 

            while ($education = $liste->fetch(PDO::FETCH_OBJ)) { ?>

                <a href="administration.education.php?choix=modifier&modif=<?php echo $education->id_education; ?>"><?php echo $education->formation . " à " . $education->ecole; ?></a>  
                <br>

            <?php }
        }

        else if(!empty($_GET["modif"])){ 

            $result = $pdo->query("SELECT * FROM education WHERE id_education='$_GET[modif]'"); 
            $modif = $result->fetch(PDO::FETCH_OBJ)?>

            <form method="POST" action="">

                <div class="form-group">
                    <label for="ecole">Ecole</label>
                    <input type="texte" class="form-control" id="ecole" name="ecole" maxlength = "40" value="<?php echo $modif->ecole; ?>">
                </div>

                <div class="form-group">
                    <label for="periode">Période</label>
                    <input type="texte" class="form-control" id="periode" name="periode" maxlength = "100" value="<?php echo $modif->periode; ?>">
                </div>

                <div class="form-group">
                    <label for="formation">Formation</label>
                    <input type="texte" class="form-control" id="formation" name="formation" maxlength = "40" value="<?php echo $modif->formation; ?>">
                </div>

                <div class="form-group">
                    <label for="specialisation">Spécialisation</label>
                    <input type="texte" class="form-control" id="specialisation" name="specialisation" maxlength = "100" value="<?php echo $modif->specialisation; ?>">
                </div>

                <button type="submit" class="btn btn-primary">Modifier la formation</button><br>

            </form>

            <?php if(!empty($_POST)){

                $_POST["ecole"] = htmlentities($_POST["ecole"], ENT_QUOTES);
                $_POST["periode"] = htmlentities($_POST["periode"], ENT_QUOTES);
                $_POST["formation"] = htmlentities($_POST["formation"], ENT_QUOTES);
                $_POST["specialisation"] = htmlentities($_POST["specialisation"], ENT_QUOTES);

                $requeteSQL = "UPDATE education";
                $requeteSQL .= " SET ecole='$_POST[ecole]', periode='$_POST[periode]', formation='$_POST[formation]', specialisation='$_POST[specialisation]'";
                $requeteSQL .= " WHERE id_education='$_GET[modif]'";
                $pdo->exec($requeteSQL);
                header("Location:administration.education.php?choix=modifier");
            } 
        } ?>

        <br><a href="administration.education.php" class="btn btn-primary">Retour</a><br><br><br>
    
    <?php }

    else if($_GET["choix"]=="supprimer"){ ?>
    
        <!-- ------------------------------------------------------------------------------------------- -->
        <h3>Suppression d'une formation</h3>
        <!-- ------------------------------------------------------------------------------------------- -->

        <?php $liste = $pdo->query("SELECT * FROM education"); 

        if(empty($_GET["suppr"])){   

            while ($education = $liste->fetch(PDO::FETCH_OBJ)) { ?>

                <a href="administration.education.php?choix=supprimer&suppr=<?php echo $education->id_education; ?>"><?php echo $education->formation . " à " . $education->ecole; ?></a>  <br>

            <?php } ?>

            <br><a href="administration.education.php" class="btn btn-primary">Retour</a><br>
        
        <?php } 

        else{

            $pdo->exec("DELETE FROM education WHERE id_education = '$_GET[suppr]'");
            header("Location:administration.education.php?choix=supprimer");

        }?>

        <br><br>

    <?php } 
}

require_once("inc/footer.inc.php"); ?>