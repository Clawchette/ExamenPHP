<?php require_once("inc/head.inc.php"); 
require_once("inc/identification.inc.php"); 

if($admin=="active"){ ?>

    <br><br><br><h2>Modification des intérêts</h2>

    <?php $result = $pdo->query("SELECT * FROM interets WHERE id_interets='1'"); 
    $modif = $result->fetch(PDO::FETCH_OBJ)?>

    <form method="POST" action="">

        <div class="form-group">
            <textarea rows="10" class="form-control" id="interets" name="interets"><?php echo $modif->interet; ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Modifier les intérêts</button>

    </form>

    <?php if(!empty($_POST)){

        $_POST["interets"] = htmlentities($_POST["interets"], ENT_QUOTES);

        $requeteSQL = "UPDATE interets SET interet='$_POST[interets]' WHERE id_interets='1'";
        $pdo->exec($requeteSQL);

    }
}

require_once("inc/footer.inc.php"); ?>