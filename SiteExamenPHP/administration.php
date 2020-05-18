<?php require_once("inc/head.inc.php"); 
require_once("inc/identification.inc.php"); 

if($admin=="active"){ ?>

    <div class="starter-template">  

        <br><br><br><h2>Page d'administration de mon site CV</h2><br>

        <a href="administration.apropos.php" class="btn btn-primary btn-lg">À Propos</a>
        <a href="administration.experience.php" class="btn btn-primary btn-lg">Expériences</a>
        <a href="administration.education.php" class="btn btn-primary btn-lg">Éducation</a>
        <a href="administration.competences.php" class="btn btn-primary btn-lg">Compétences</a>
        <a href="administration.interets.php" class="btn btn-primary btn-lg">Intérêts</a>
        <a href="administration.recompenses.php" class="btn btn-primary btn-lg">Récompenses</a>    
            
    </div>

<?php }

require_once("inc/footer.inc.php"); ?>