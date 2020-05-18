<?php require_once("inc/head.inc.php"); 
require_once("inc/identification.inc.php"); 

if($admin=="active"){ ?>?>

    <br><br><br><h2>Compétences</h2>

    <?php if(empty($_GET)){ ?>

        <br><h4>Langages Développement Web</h4>

        <a href="administration.competences.php?choix=ajouterdevweb" class="btn btn-primary btn-lg">Ajouter</a>
        <a href="administration.competences.php?choix=supprimerdevweb" class="btn btn-primary btn-lg">Supprimer</a>



        <br><br><br><h4>Langages Développement Logiciel</h4>

        <a href="administration.competences.php?choix=ajouterdevlog" class="btn btn-primary btn-lg">Ajouter</a>
        <a href="administration.competences.php?choix=supprimerdevlog" class="btn btn-primary btn-lg">Supprimer</a>



        <br><br><br><h4>Langues</h4>

        <a href="administration.competences.php?choix=ajouterlang" class="btn btn-primary btn-lg">Ajouter</a>
        <a href="administration.competences.php?choix=modifierlang" class="btn btn-primary btn-lg">Modifier</a>
        <a href="administration.competences.php?choix=supprimerlang" class="btn btn-primary btn-lg">Supprimer</a>

    <?php } 
    
    else if($_GET["choix"]=="ajouterdevweb"){ ?>

        <!-- ------------------------------------------------------------------------------------------- -->
        <br><h3>Ajout d'un langage de développement web</h3>
        <!-- ------------------------------------------------------------------------------------------- -->

        <form method="POST" action="">

            <div class="form-group">
                <label for="devweb">Ajout d'une icône</label>
                <input type="texte" class="form-control" id="devweb" name="devweb" placeholder="Entrez le contenu de la class de l'icône. Ex: fab fa-html5" maxlength = "40">
                <br><p>L'icône doit provenir de <a href="https://fontawesome.com/">FontAwesome</a> ou <a href="http://konpa.github.io/devicon/">Devicon</a>.</p>
            </div>

            <br><button type="submit" class="btn btn-primary">Ajouter</button>    

        </form>

        <br><a href="administration.competences.php" class="btn btn-primary">Retour</a><br><br><br>

        <?php if(!empty($_POST)){

            $_POST["devweb"] = htmlentities($_POST["devweb"], ENT_QUOTES);

            $requeteSQL = "INSERT INTO competencesweb (competenceweb) VALUE ('$_POST[devweb]')";
            $pdo->exec($requeteSQL);
            header("Location:administration.competences.php?choix=ajouterdevweb");

        } 
    } 

    else if($_GET["choix"]=="supprimerdevweb"){ ?>

        <!-- ------------------------------------------------------------------------------------------- -->
        <br><h3>Suppression d'un langage de développement web</h3>
        <!-- ------------------------------------------------------------------------------------------- -->

        <?php $liste = $pdo->query("SELECT * FROM competencesweb"); 

        if(empty($_GET["suppr"])){              
            while ($devweb = $liste->fetch(PDO::FETCH_OBJ)) { ?>

                <a href="administration.competences.php?choix=supprimerdevweb&suppr=<?php echo $devweb->id_compweb; ?>"><i class="<?php echo $devweb->competenceweb; ?>"></i></a>  
            
            <?php } ?>

            <br><a href="administration.competences.php" class="btn btn-primary">Retour</a><br>

        <?php } 

        else{

            $pdo->exec("DELETE FROM competencesweb WHERE id_compweb = '$_GET[suppr]'");
            header("Location:administration.competences.php?choix=supprimerdevweb");

        }?>
    <?php } 

    else if($_GET["choix"]=="ajouterdevlog"){ ?>

        <!-- ------------------------------------------------------------------------------------------- -->
        <br><h3>Ajout d'un langage de développement logiciel</h3>
        <!-- ------------------------------------------------------------------------------------------- -->

        <form method="POST" action="">

            <div class="form-group">
                <label for="devlog">Ajout d'une icône</label>
                <input type="texte" class="form-control" id="devlog" name="devlog" placeholder="Entrez le contenu de la class de l'icône. Ex: devicon-csharp-line" maxlength = "40">
                
                <br><p>L'icône doit provenir de <a href="https://fontawesome.com/">FontAwesome</a> ou <a href="http://konpa.github.io/devicon/">Devicon</a>.</p>
            </div>

            <br><button type="submit" class="btn btn-primary">Ajouter</button>  

        </form>

        <br><a href="administration.competences.php" class="btn btn-primary">Retour</a><br><br><br>

        <?php if(!empty($_POST)){

            $_POST["devlog"] = htmlentities($_POST["devlog"], ENT_QUOTES);

            $requeteSQL = "INSERT INTO competenceslog (competencelog) VALUE ('$_POST[devlog]')";
            $pdo->exec($requeteSQL);
            header("Location:administration.competences.php?choix=ajouterdevlog");

        }
    } 

    else if($_GET["choix"]=="supprimerdevlog"){ ?>

        <!-- ------------------------------------------------------------------------------------------- -->
        <br><h3>Suppression d'un langage de développement logiciel</h3>
        <!-- ------------------------------------------------------------------------------------------- -->

        <?php $liste = $pdo->query("SELECT * FROM competenceslog"); 

        if(empty($_GET["suppr"])){  

            while ($devlog = $liste->fetch(PDO::FETCH_OBJ)) { ?>

                <a href="administration.competences.php?choix=supprimerdevlog&suppr=<?php echo $devlog->id_complog; ?>"><i class="<?php echo $devlog->competencelog; ?>"></i></a>  
            
            <?php } ?>

            <br><a href="administration.competences.php" class="btn btn-primary">Retour</a><br>

        <?php } 

        else{

            $pdo->exec("DELETE FROM competenceslog WHERE id_complog = '$_GET[suppr]'");
            header("Location:administration.competences.php?choix=supprimerdevlog");
        }?>
    <?php } 

    else if($_GET["choix"]=="ajouterlang"){ ?>
        
        <!-- ------------------------------------------------------------------------------------------- -->
        <h3>Ajout d'une langue</h3><br>
        <!-- ------------------------------------------------------------------------------------------- -->

        <form method="POST" action="">

            <div class="form-group">
                <label for="langue">Langue</label>
                <input type="texte" class="form-control" id="langue" name="langue" placeholder="Le nom de la langue..." maxlength = "40">
            </div>

            <div class="form-group">
                <label for="niveau">Niveau</label>
                <input type="texte" class="form-control" id="niveau" name="niveau" placeholder="Une description de votre niveau..." maxlength = "100">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter une langue</button>
                
        </form>

        <br><a href="administration.competences.php" class="btn btn-primary">Retour</a><br>

        <?php if(!empty($_POST)){

        $_POST["langue"] = htmlentities($_POST["langue"], ENT_QUOTES);
        $_POST["niveau"] = htmlentities($_POST["niveau"], ENT_QUOTES);

        $requeteSQL = "INSERT INTO competenceslang (competencelang, nivlang) VALUE ('$_POST[langue]', '$_POST[niveau]')";
        $pdo->exec($requeteSQL);
        header("Location:administration.competences.php?choix=ajouterlang");

        }
    }

    else if($_GET["choix"]=="modifierlang"){ ?>

        <!-- ------------------------------------------------------------------------------------------- -->
        <h3>Modification d'une langue</h3><br>
        <!-- ------------------------------------------------------------------------------------------- -->

        <?php $liste = $pdo->query("SELECT * FROM competenceslang"); 

        if(empty($_GET["modif"])){   

            while ($complang = $liste->fetch(PDO::FETCH_OBJ)) { ?>

                <a href="administration.competences.php?choix=modifierlang&modif=<?php echo $complang->id_complang; ?>"><?php echo $complang->competencelang; ?></a>  <br>

            <?php }
        }

        else if(!empty($_GET["modif"])){

            $result = $pdo->query("SELECT * FROM competenceslang WHERE id_complang='$_GET[modif]'"); 
            $modif = $result->fetch(PDO::FETCH_OBJ)?>

            <form method="POST" action="">

                <div class="form-group">
                    <label for="langue">Langue</label>
                    <input type="texte" class="form-control" id="langue" name="langue" value="<?php echo $modif->competencelang; ?>"" maxlength = "40">
                </div>

                <div class="form-group">
                    <label for="niveau">Niveau</label>
                    <input type="texte" class="form-control" id="niveau" name="niveau" value="<?php echo $modif->nivlang; ?>"" maxlength = "100">
                </div>

                <button type="submit" class="btn btn-primary">Modifier une langue</button>
                    
            </form>

            <?php if(!empty($_POST)){

                $_POST["langue"] = htmlentities($_POST["langue"], ENT_QUOTES);
                $_POST["niveau"] = htmlentities($_POST["niveau"], ENT_QUOTES);

                $requeteSQL = "UPDATE competenceslang SET competencelang='$_POST[langue]', nivlang='$_POST[niveau]' ";
                $requeteSQL .= "WHERE id_complang='$_GET[modif]'";
                $pdo->exec($requeteSQL);
                header("Location:administration.competences.php?choix=modifierlang");

            }
        } ?>

        <br><a href="administration.competences.php" class="btn btn-primary">Retour</a><br>

    <?php }

    else if($_GET["choix"]=="supprimerlang"){ ?>

        <!-- ------------------------------------------------------------------------------------------- -->
        <h3>Suppression d'une langue</h3><br>
        <!-- ------------------------------------------------------------------------------------------- -->

        <?php $liste = $pdo->query("SELECT * FROM competenceslang"); 

        if(empty($_GET["suppr"])){       

            while ($langue = $liste->fetch(PDO::FETCH_OBJ)) { ?>

                <a href="administration.competences.php?choix=supprimerlang&suppr=<?php echo $langue->id_complang; ?>"><?php echo $langue->competencelang; ?></a>  <br>

            <?php } ?>

            <br><a href="administration.competences.php" class="btn btn-primary">Retour</a><br>

        <?php } 

        else{

            $pdo->exec("DELETE FROM competenceslang WHERE id_complang = '$_GET[suppr]'");
            header("Location:administration.competences.php?choix=supprimerlang");

        }
    }
}

require_once("inc/footer.inc.php"); ?>