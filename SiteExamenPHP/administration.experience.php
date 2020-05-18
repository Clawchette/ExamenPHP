<?php require_once("inc/head.inc.php"); 
require_once("inc/identification.inc.php"); 

if($admin=="active"){ 
    // ^Vérifie que l'utilisateur est connecté sur un compte admin (voir indentification.inc.php) ?>

    <br><br><br><h2>Expériences</h2><br>

    <?php if(empty($_GET)){ ?>

        <a href="administration.experience.php?choix=ajouter" class="btn btn-primary btn-lg">Ajouter</a>
        <a href="administration.experience.php?choix=modifier" class="btn btn-primary btn-lg">Modifier</a>
        <a href="administration.experience.php?choix=supprimer" class="btn btn-primary btn-lg">Supprimer</a>

    <?php } 

    else if($_GET["choix"]=="ajouter"){?>

        <!-- ------------------------------------------------------------------------------------------- -->
        <h3>Ajout d'une expérience</h3><br>
        <!-- ------------------------------------------------------------------------------------------- -->

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

        <br><a href="administration.experience.php" class="btn btn-primary">Retour</a><br><br><br>

        <?php if(!empty($_POST)){

            $_POST["emploi"] = htmlentities($_POST["emploi"], ENT_QUOTES);
            $_POST["periode"] = htmlentities($_POST["periode"], ENT_QUOTES);
            $_POST["entreprise"] = htmlentities($_POST["entreprise"], ENT_QUOTES);
            $_POST["jobdescription"] = htmlentities($_POST["jobdescription"], ENT_QUOTES);
            // ^Vérifie que les données entrées ne contiennent pas de code

            $requeteSQL = "INSERT INTO experiences (emploi, periode, entreprise, jobdescription)";
            $requeteSQL .= " VALUE ('$_POST[emploi]', '$_POST[periode]', '$_POST[entreprise]', '$_POST[jobdescription]')";
            
            $pdo->exec($requeteSQL);
            //^Enregistre les données dans la base de données

            header("Location:administration.experience.php?choix=ajouter");
            // ^Actualise la page

        } 
    }

    else if($_GET["choix"]=="modifier"){ ?>

        <!-- ------------------------------------------------------------------------------------------- -->
        <h3>Modification d'une expérience</h3>
        <!-- ------------------------------------------------------------------------------------------- -->
        
        <?php $liste = $pdo->query("SELECT * FROM experiences"); 

        if(empty($_GET["modif"])){    

            while ($experience = $liste->fetch(PDO::FETCH_OBJ)) { ?>

                <a href="administration.experience.php?choix=modifier&modif=<?php echo $experience->id_experience; ?>"><?php echo $experience->emploi . " chez " . $experience->entreprise; ?></a><br>
            
            <?php }
        }
        // ^Affiche la liste des expériences déjà existantes (et donc modifiables)

        else if(!empty($_GET["modif"])){ 

            $result = $pdo->query("SELECT * FROM experiences WHERE id_experience='$_GET[modif]'"); 
            $modif = $result->fetch(PDO::FETCH_OBJ)?>

            <form method="POST" action="">

                <div class="form-group">
                    <label for="emploi">Emploi</label>
                    <input type="texte" class="form-control" id="emploi" name="emploi" maxlength = "40" value="<?php echo $modif->emploi; ?>">
                </div>
                <!-- les données déjà enregistrées sont injectées dans le paramètre "value" pour qu'elles puissent être modifiées-->

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

                <button type="submit" class="btn btn-primary">Modifier l'expérience</button><br>

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
        <br><a href="administration.experience.php" class="btn btn-primary">Retour</a><br><br><br>

    <?php }

    else if($_GET["choix"]=="supprimer"){ ?>
    
        <!-- ------------------------------------------------------------------------------------------- -->
        <h3>Suppression d'une expérience</h3>
        <!-- ------------------------------------------------------------------------------------------- -->

        <?php $liste = $pdo->query("SELECT * FROM experiences"); 

        if(empty($_GET["suppr"])){   

            while ($experience = $liste->fetch(PDO::FETCH_OBJ)) { ?>

                <a href="administration.experience.php?choix=supprimer&suppr=<?php echo $experience->id_experience; ?>"><?php echo $experience->emploi . " chez " . $experience->entreprise; ?></a>  
            
            <?php } 
            // ^Affiche la liste des éléments déjà existants (et donc supprimables) ?>

            <br><a href="administration.experience.php" class="btn btn-primary">Retour</a><br><br><br>

        <?php } 

        else{

            $pdo->exec("DELETE FROM experiences WHERE id_experience = '$_GET[suppr]'");
            // ^Supprime l'élément choisi

            header("Location:administration.experience.php?choix=supprimer");

        }
    } 
}

require_once("inc/footer.inc.php"); ?>