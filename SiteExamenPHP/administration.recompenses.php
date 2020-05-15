<?php require_once("inc/head.inc.php"); 
require_once("inc/header.inc.php"); ?>
    <br><br><br>
    <h2>Récompenses & Certifications</h2>
    <br>

    <?php
    if(empty($_GET)){ ?>
        <a href="administration.recompenses.php?choix=ajouter" class="btn btn-primary btn-lg">Ajouter</a>
        <a href="administration.recompenses.php?choix=modifier" class="btn btn-primary btn-lg">Modifier</a>
        <a href="administration.recompenses.php?choix=supprimer" class="btn btn-primary btn-lg">Supprimer</a>
    <?php } 
    else if($_GET["choix"]=="ajouter"){?>

        <!-- ------------------------------------------------------------------------------------------- -->
        <h3>Ajout d'une récompense</h3>
        <!-- ------------------------------------------------------------------------------------------- -->

        <br>
        <form method="POST" action="">

            <div class="form-group">
                <label for="recompense">Récompense</label>
                <input type="texte" class="form-control" id="recompense" name="recompense" placeholder="Nom de la récompense ou certification que vous avez obtenu..." maxlength = "100">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter une récompense</button>
            
        </form>
        <br>
        <a href="administration.recompenses.php" class="btn btn-primary">Retour</a>
        <br>
        <br><br>
        <?php if(!empty($_POST)){

            $_POST["recompense"] = htmlentities($_POST["recompense"], ENT_QUOTES);
            
            $requeteSQL = "INSERT INTO recompenses (recompense) VALUE ('$_POST[recompense]')";
            $pdo->exec($requeteSQL);
            header("Location:administration.recompenses.php?choix=ajouter");
        } 
    }


    else if($_GET["choix"]=="modifier"){ ?>

        <!-- ------------------------------------------------------------------------------------------- -->
        <h3>Modification d'une récompense</h3>
        <!-- ------------------------------------------------------------------------------------------- -->

        <?php 
        $liste = $pdo->query("SELECT * FROM recompenses"); 

        //permet le choix de la récompense à modifier
        if(empty($_GET["modif"])){              
            while ($recompense = $liste->fetch(PDO::FETCH_OBJ)) { ?>
                <a href="administration.recompenses.php?choix=modifier&modif=<?php echo $recompense->id_recompense; ?>"><?php echo $recompense->recompense; ?></a>  
                <br>
            <?php }
        }

        //affiche la récompense choisie dans un formulaire pour la modifier
        else if(!empty($_GET["modif"])){ 
            $result = $pdo->query("SELECT * FROM recompenses WHERE id_recompense='$_GET[modif]'"); 
            $modif = $result->fetch(PDO::FETCH_OBJ)?>
            <form method="POST" action="">

                <div class="form-group">
                    <label for="recompense">Récompense</label>
                    <input type="texte" class="form-control" id="recompense" name="recompense" placeholder="Nom de la récompense ou certification que vous avez obtenu..." maxlength = "100" value="<?php echo $modif->ecole; ?>">
                </div>

                <button type="submit" class="btn btn-primary">Modifier la récompense</button>

            </form>
            <?php if(!empty($_POST)){

                $_POST["recompense"] = htmlentities($_POST["recompense"], ENT_QUOTES);

                $requeteSQL = "UPDATE recompenses SET recompense='$_POST[recompense]' WHERE id_recompense='$_GET[modif]'";
                $pdo->exec($requeteSQL);
                header("Location:administration.recompenses.php?choix=modifier");
            } 
        } ?>
        <br>
        <a href="administration.recompenses.php" class="btn btn-primary">Retour</a>
        <br>
        <br><br>
    <?php }

    else if($_GET["choix"]=="supprimer"){ ?>
    
        <!-- ------------------------------------------------------------------------------------------- -->
        <h3>Suppression d'une récompense</h3>
        <!-- ------------------------------------------------------------------------------------------- -->

        <?php 
        $liste = $pdo->query("SELECT * FROM recompenses"); 

        //permet le choix de la récompense à supprimer
        if(empty($_GET["suppr"])){              
            while ($recompense = $liste->fetch(PDO::FETCH_OBJ)) { ?>
                <a href="administration.recompenses.php?choix=supprimer&suppr=<?php echo $recompense->id_recompense; ?>"><?php echo $recompense->emploi . " chez " . $recompense->entreprise; ?></a>  
            <?php } ?>
            <br>
            <a href="administration.recompenses.php" class="btn btn-primary">Retour</a>
            <br>
        <?php } 
        else{
            $pdo->exec("DELETE FROM recompenses WHERE id_recompense = '$_GET[suppr]'");
            header("Location:administration.recompenses.php?choix=supprimer");
        }?>

        <br><br>
    <?php } 

require_once("inc/footer.inc.php"); ?>