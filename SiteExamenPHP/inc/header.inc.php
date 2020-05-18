<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="administration.php">Administration</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item <?php echo $admin;?>">
            <a class="nav-link" href="administration.apropos.php">A Propos</a>
            </li>
            <li class="nav-item <?php echo $admin;?>">
            <a class="nav-link" href="administration.experience.php">Expériences</a>
            </li>
            <li class="nav-item <?php echo $admin;?>">
            <a class="nav-link" href="administration.education.php">Éducation</a>
            </li>
            <li class="nav-item <?php echo $admin;?>">
            <a class="nav-link" href="administration.competences.php">Compétences</a>
            </li>
            <li class="nav-item <?php echo $admin;?>">
            <a class="nav-link" href="administration.interets.php">Intérêts</a>
            </li> 
            <li class="nav-item <?php echo $admin;?>">
            <a class="nav-link" href="administration.recompenses.php">Récompenses</a>
            </li>
        </ul>

        <form method="post" action="">
            <input type="hidden" name="goClearSession" value="1" >
            <input type="submit" value="Déconnexion" class="btn btn-danger btn-lg btn-block">
        </form>
        <?php if(!empty($_POST["goClearSession"])) {
            $_SESSION = array();
            header("Location:administration.php");
        }
        ?>
    </nav>