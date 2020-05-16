<?php require_once("inc/head.inc.php"); 
require_once("inc/identification.inc.php"); 
if($admin=="active"){ ?>?>
    <br><br><br>
    <h2>Expériences</h2>
    <br>

    <?php
    if(empty($_GET)){ ?>
        <a href="administration.experience.php?choix=ajouter" class="btn btn-primary btn-lg">Ajouter</a>
        <a href="administration.experience.php?choix=modifier" class="btn btn-primary btn-lg">Modifier</a>
        <a href="administration.experience.php?choix=supprimer" class="btn btn-primary btn-lg">Supprimer</a>
    <?php } 
    else if($_GET["choix"]=="ajouter"){?>

        <!-- ------------------------------------------------------------------------------------------- -->
        <h3>Ajout d'une expérience</h3>
        <!-- ------------------------------------------------------------------------------------------- -->

        <br>
        <form method="POST" action="">

            <div class="form-group">
                <label for="emploi">Emploi</label>
                <input type="texte" class="form-control" id="emploi" name="emploi" placeholder="Votre emploi dans l'entreprise..." maxlength = "40">
            </div>

            <div class="form-group">
                <label for="periode">Période</label>
                <input type="texte" class="form-control" id="periode" name="periode" placeholder="De <Mois Année> à <Mois Année>" maxlength = "40">
            </div>

            <div class="form-group">
                <label for="entreprise">Entreprise</label>
                <input type="texte" class="form-control" id="entreprise" name="entreprise" placeholder="Nom de l'entreprise pour laquelle vous avez travaillez..." maxlength = "40">
            </div>

            <div class="form-group">
                <label for="jobdescription">Description</label>
                <textarea rows="10" class="form-control" id="jobdescription" name="jobdescription" placeholder="Description de ce que cette expérience vous a apporté..."></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter une expérience</button>
            
        </form>
        <br>
        <a href="administration.experience.php" class="btn btn-primary">Retour</a>
        <br>
        <br><br>
        <?php if(!empty($_POST)){

            $_POST["emploi"] = htmlentities($_POST["emploi"], ENT_QUOTES);
            $_POST["periode"] = htmlentities($_POST["periode"], ENT_QUOTES);
            $_POST["entreprise"] = htmlentities($_POST["entreprise"], ENT_QUOTES);
            $_POST["jobdescription"] = htmlentities($_POST["jobdescription"], ENT_QUOTES);
            
            $requeteSQL = "INSERT INTO experiences (emploi, periode, entreprise, jobdescription)";
            $requeteSQL .= " VALUE ('$_POST[emploi]', '$_POST[periode]', '$_POST[entreprise]', '$_POST[jobdescription]')";
            $pdo->exec($requeteSQL);
            header("Location:administration.experience.php?choix=ajouter");
        } 
    }


    else if($_GET["choix"]=="modifier"){ ?>

        <!-- ------------------------------------------------------------------------------------------- -->
        <h3>Modification d'une expérience</h3>
        <!-- ------------------------------------------------------------------------------------------- -->
        
        <?php 
        $liste = $pdo->query("SELECT * FROM experiences"); 

        //permet le choix de l'expérience à modifier
        if(empty($_GET["modif"])){              
            while ($experience = $liste->fetch(PDO::FETCH_OBJ)) { ?>
                <a href="administration.experience.php?choix=modifier&modif=<?php echo $experience->id_experience; ?>"><?php echo $experience->emploi . " chez " . $experience->entreprise; ?></a>  
                <br>
            <?php }
        }

        //affiche l'expérience choisie dans un formulaire pour la modifier
        else if(!empty($_GET["modif"])){ 
            $result = $pdo->query("SELECT * FROM experiences WHERE id_experience='$_GET[modif]'"); 
            $modif = $result->fetch(PDO::FETCH_OBJ)?>
            <form method="POST" action="">

                <div class="form-group">
                    <label for="emploi">Emploi</label>
                    <input type="texte" class="form-control" id="emploi" name="emploi" maxlength = "40" value="<?php echo $modif->emploi; ?>">
                </div>

                <div class="form-group">
                    <label for="periode">Période</label>
                    <input type="texte" class="form-control" id="periode" name="periode" maxlength = "40" value="<?php echo $modif->periode; ?>">
                </div>

                <div class="form-group">
                    <label for="entreprise">Entreprise</label>
                    <input type="texte" class="form-control" id="entreprise" name="entreprise" maxlength = "40" value="<?php echo $modif->entreprise; ?>">
                </div>

                <div class="form-group">
                    <label for="jobdescription">Description</label>
                    <textarea rows="10" class="form-control" id="jobdescription" name="jobdescription"><?php echo $modif->jobdescription; ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Modifier l'expérience</button>

            </form>
            <?php if(!empty($_POST)){

                $_POST["emploi"] = htmlentities($_POST["emploi"], ENT_QUOTES);
                $_POST["periode"] = htmlentities($_POST["periode"], ENT_QUOTES);
                $_POST["entreprise"] = htmlentities($_POST["entreprise"], ENT_QUOTES);
                $_POST["jobdescription"] = htmlentities($_POST["jobdescription"], ENT_QUOTES);

                $requeteSQL = "UPDATE experiences";
                $requeteSQL .= " SET emploi='$_POST[emploi]', periode='$_POST[periode]', entreprise='$_POST[entreprise]', jobdescription='$_POST[jobdescription]'";
                $requeteSQL .= " WHERE id_experience='$_GET[modif]'";
                $pdo->exec($requeteSQL);
                header("Location:administration.experience.php?choix=modifier");
            } 
        } ?>
        <br>
        <a href="administration.experience.php" class="btn btn-primary">Retour</a>
        <br>
        <br><br>
    <?php }

    else if($_GET["choix"]=="supprimer"){ ?>
    
        <!-- ------------------------------------------------------------------------------------------- -->
        <h3>Suppression d'une expérience</h3>
        <!-- ------------------------------------------------------------------------------------------- -->

        <?php 
        $liste = $pdo->query("SELECT * FROM experiences"); 

        //permet le choix de l'expérience à supprimer
        if(empty($_GET["suppr"])){              
            while ($experience = $liste->fetch(PDO::FETCH_OBJ)) { ?>
                <a href="administration.experience.php?choix=supprimer&suppr=<?php echo $experience->id_experience; ?>"><?php echo $experience->emploi . " chez " . $experience->entreprise; ?></a>  
            <?php } ?>
            <br>
            <a href="administration.experience.php" class="btn btn-primary">Retour</a>
            <br>
        <?php } 
        else{
            $pdo->exec("DELETE FROM experiences WHERE id_experience = '$_GET[suppr]'");
            header("Location:administration.experience.php?choix=supprimer");
        }?>

        <br><br>
    <?php } 
}
require_once("inc/footer.inc.php"); ?>