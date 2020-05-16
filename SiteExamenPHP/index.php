<?php require_once("inc/head.inc.php");
$resultapropos = $pdo->query("SELECT * FROM apropos WHERE id_apropos='1'"); 
$apropos = $resultapropos->fetch(PDO::FETCH_OBJ)?>
<body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <span class="d-block d-lg-none"><?php echo $apropos->prenom . " " . $apropos->nom; ?></span>
      <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="<?php echo $apropos->cheminphoto; ?>" alt="ma photo">
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#about">A Propos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#experience">Expérience</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#education">éducation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#skills">Compétences</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#interests">Intérêts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#awards">Récompenses</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid p-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
      <div class="w-100">
        <h1 class="mb-0"><?php echo $apropos->prenom; ?>
          <span class="text-primary"><?php echo $apropos->nom; ?></span>
        </h1>
        <div class="subheading mb-5"><?php echo $apropos->rue . " · " . $apropos->ville . ", " . $apropos->codepostal . " · " . $apropos->telephone . " · "; ?>
          <a href="mailto:<?php echo $apropos->email; ?>"><?php echo $apropos->email; ?></a>
        </div>
        <p class="lead mb-5"><?php echo $apropos->description; ?></p>
        <div class="social-icons">
          <a href="<?php echo $apropos->lienlinkedin; ?>">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="<?php echo $apropos->liengithub; ?>">
            <i class="fab fa-github"></i>
          </a>
          <a href="<?php echo $apropos->lientwitter; ?>">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="<?php echo $apropos->lienfacebook; ?>">
            <i class="fab fa-facebook-f"></i>
          </a>
        </div>
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="experience">
      <div class="w-100">
        <h2 class="mb-5">Expérience</h2>

        <?php
        $experiences = $pdo->query("SELECT * FROM experiences"); 

        if(!empty($experiences)){              
            while ($experience = $experiences->fetch(PDO::FETCH_OBJ)) { ?>
              <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                <div class="resume-content">
                  <h3 class="mb-0"><?php echo $experience->emploi; ?></h3>
                  <div class="subheading mb-3"><?php echo $experience->entreprise; ?></div>
                  <p><?php echo $experience->jobdescription; ?></p>
                </div>
                <div class="resume-date text-md-right">
                  <span class="text-primary"><?php echo $experience->periode; ?></span>
                </div>
              </div>

                <br>
            <?php }
        }
        ?>

      </div>

    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="education">
      <div class="w-100">
        <h2 class="mb-5">éducation</h2>

        <?php
        $education = $pdo->query("SELECT * FROM education"); 

        if(!empty($education)){              
            while ($formation = $education->fetch(PDO::FETCH_OBJ)) { ?>
              <div class="resume-item d-flex flex-column flex-md-row justify-content-between">
                <div class="resume-content">
                  <h3 class="mb-0"><?php echo $formation->ecole; ?></h3>
                  <div class="subheading mb-3"><?php echo $formation->formation; ?></div>
                  <p><?php echo $formation->specialisation; ?></p>
                </div>
                <div class="resume-date text-md-right">
                  <span class="text-primary"><?php echo $formation->periode; ?></span>
                </div>
              </div>

                <br>
            <?php }
        }
        ?>  

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="skills">
      <div class="w-100">
        <h2 class="mb-5">Compétences</h2>

        <div class="subheading mb-3">Langages de développement web</div>
        <ul class="list-inline dev-icons">

          <?php
          $devweb = $pdo->query("SELECT * FROM competencesweb"); 

          if(!empty($devweb)){              
            while ($compweb = $devweb->fetch(PDO::FETCH_OBJ)) { ?>
              <li class="list-inline-item">
                <i class="<?php echo $compweb->competenceweb; ?>"></i>
              </li>
            <?php }
          } ?>
        </ul>

        <div class="subheading mb-3">Langages de développement logiciel</div>
        <ul class="list-inline dev-icons">

          <?php
          $devlog = $pdo->query("SELECT * FROM competenceslog"); 

          if(!empty($devlog)){              
            while ($complog = $devlog->fetch(PDO::FETCH_OBJ)) { ?>
              <li class="list-inline-item">
                <i class="<?php echo $complog->competencelog; ?>"></i>
              </li>
            <?php } 
          } ?>
        </ul>


        <div class="subheading mb-3">Langues</div>
        <ul class="fa-ul mb-0">

        <?php
          $langue = $pdo->query("SELECT * FROM competenceslang"); 

          if(!empty($langue)){              
            while ($complang = $langue->fetch(PDO::FETCH_OBJ)) { ?>
              <li>
                <i class="fa-li fa fa-check"></i>
                <?php echo $complang->competencelang . " : " . $complang->nivlang; ?>
              </li>
            <?php } 
          }?>
        </ul>
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="interests">
      <div class="w-100">
        <h2 class="mb-5">Intérêts</h2>
        <?php 
        $interet = $pdo->query("SELECT * FROM interets"); 
        $interets = $interet->fetch(PDO::FETCH_OBJ);
        echo "<p>$interets->interet</p>";
        ?>  
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="awards">
      <div class="w-100">
        <h2 class="mb-5">Récompenses &amp; Certifications</h2>
        <ul class="fa-ul mb-0">

        <?php
        $recompenses = $pdo->query("SELECT * FROM recompenses"); 

        if(!empty($recompenses)){              
          while ($recompense = $recompenses->fetch(PDO::FETCH_OBJ)) { ?>
            <li>
              <i class="fa-li fa fa-trophy text-warning"></i>
              <?php echo $recompense->recompense; ?>
              </li>
          <?php }
        } ?>
        </ul>
      </div>
    </section>

  </div>

<?php require_once("inc/footer.inc.php"); ?>
