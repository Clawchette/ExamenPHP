<?php require_once("head.inc.php");

session_start();

$result = $pdo->query("SELECT * FROM identification WHERE id_admin='1'"); 
$adminID = $result->fetch(PDO::FETCH_OBJ);

if(!($_SESSION["pseudo"]==$adminID->pseudo && $_SESSION["mdp"]==$adminID->mdp)){
    $admin="inactive"; ?>

    <br><br><br>
    <h2>Authentification requise !</h2>
    <br>

    <form method="POST" action="">

        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="texte" class="form-control" id="pseudo" name="pseudo" placeholder="Entrez le pseudo de l'administrateur..." maxlength = "20">
        </div>

        <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <input type="texte" class="form-control" id="mdp" name="mdp" placeholder="Entrez le mot de passe de l'administrateur..." maxlength = "30">
        </div>

        <button type="submit" class="btn btn-primary">Se connecter</button>

    </form>

    <?php if(!empty($_POST)){
        $_SESSION["pseudo"]=$_POST["pseudo"];
        $_SESSION["mdp"]=$_POST["mdp"];
        header("Location:administration.php");
    }

}

else{
    $admin="active";
}

require_once("inc/header.inc.php");
?>