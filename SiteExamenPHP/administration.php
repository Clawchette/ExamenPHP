<?php require_once("inc/head.inc.php"); 
require_once("inc/header.inc.php"); ?>
<div class="starter-template">  
    <br><br><br>
    <?php if(empty($_GET)){       //s'il n'y a rien dans $_GET -> page d'accueil de la page Admin ?>
        <h2>Page d'administration de mon site CV</h2>
        <br>
        <!-- <a href="administration.php?choix=apropos" class="btn btn-primary btn-lg">A Propos</a> -->
        <a href="administration.php?choix=experiences" class="btn btn-primary btn-lg">Expériences</a>
        <!-- <a href="administration.php?choix=education" class="btn btn-primary btn-lg">Education</a>
        <a href="administration.php?choix=competences" class="btn btn-primary btn-lg">Compétences</a>
        <a href="administration.php?choix=interets" class="btn btn-primary btn-lg">Intérets</a>
        <a href="administration.php?choix=recompenses" class="btn btn-primary btn-lg">Récompenses</a> -->
        
    <?php }
    //*************************************************************************************************** */
    //EXPERIENCES
    //*************************************************************************************************** */
    else if($_GET["choix"]=="experiences"){?>
        <h2>Expériences</h2>
        <br><br>
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
        <?php if(!empty($_POST)){
            $pdo = new PDO("mysql:host=localhost;dbname=dbexamenphp","root","",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    
            $_POST["emploi"] = htmlentities($_POST["emploi"], ENT_QUOTES);
            $_POST["periode"] = htmlentities($_POST["periode"], ENT_QUOTES);
            $_POST["entreprise"] = htmlentities($_POST["entreprise"], ENT_QUOTES);
            $_POST["jobdescription"] = htmlentities($_POST["jobdescription"], ENT_QUOTES);
            
            $requeteSQL = "INSERT INTO experiences (emploi, periode, entreprise, jobdescription)";
            $requeteSQL .= " VALUE ('$_POST[emploi]', '$_POST[periode]', '$_POST[entreprise]', '$_POST[jobdescription]')";
            $result = $pdo->exec($requeteSQL);
            echo $result . ' donnée(s) affectée(s) par la requête INSERT.<br>';
        }
    } ?>
</div>




<?php require_once("inc/footer.inc.php"); ?>