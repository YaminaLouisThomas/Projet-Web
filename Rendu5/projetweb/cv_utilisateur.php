<?php require_once("includes/function.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Louis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/portfolio.css">
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/modify.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.3.1.js" async></script>
    <script src="JS/burgerCV.js" async></script>
    
    <?php if(isset($_SESSION["connected"])) :
    if ($_SESSION["modification"] == 1) : ?>
    <script src="JS/modify.js" async></script>
    <?php endif; endif; ?>

</head>
<body>
       <img class="burger" onclick="burger()" src="image/icons8-menu-filled-50.png" alt="">
    <aside>
        <nav>
            <img src="image/<?= $info_user[0]["image_u"] ?>" alt="">
            <a href="#home" class="home"><i class="material-icons md-36">home</i>
            <p>Accueil</p>
            </a>

            <a href="#about" class="about"><i class="material-icons md-36">person</i>
            <p>A Propos</p>
            </a>

            <a href="#projets" class="project"><i class="material-icons md-36">image</i>
            <p>Projets</p>
            </a>

            <a href="#contact" class="contact"><i class="material-icons md-36">mail</i>
            <p>Contact</p>
            </a>

            

            <?php  if(isset($_SESSION["connected"])) :
            if(isset($_GET["id"])): ?>
            
           <?php elseif ($_SESSION["modification"] == 0) : ?>
            <form class="form_cv" action=""  method="post">
            <input type="hidden" name="valeur1" value="1">
            <i class="material-icons md-36">undo</i>
            <button class="button_cv" name="mod" type="submit"><p>Modifier</p></button>
            </form>
            <?php elseif ($_SESSION["modification"] == 1) : ?>
            <form class="form_cv" action="" method="post">
            <input type="hidden" name="valeur2" value="0">
            <i class="material-icons md-36">redo</i>
            <button class="button_cv" name="vis" type="submit"><p>Visualiser</p></button>
            </form>
            <?php endif; endif; ?>

            <?php  if(isset($_SESSION["connected"])) : ?>
            <a class="msg" href="deconnexion.php"><i class="material-icons md-36">reply</i><p>deconnexion</p></a>
            <?php endif; ?>
            
            <?php if($_SESSION['admin'] == 1) :?>
            <a class="msg" href="admin.php"><i class="material-icons md-36">reply</i><p>Admin</p></a>
            <?php else :?>
            <a class="msg" href="accueil.php"><i class="material-icons md-36">reply</i><p>exemple</p></a>
            <?php endif ?>

        </nav>
            <div class="form_home">
                <form action="" method="post" enctype="multipart/form-data"> 
                <div class="input_form">       
                <input type="text" name="prenom" placeholder="Prenom">
                <input type="text" name="nom" placeholder="Nom">
                </div>    
                <input type="file" name="img" placeholder="Nom" class="img_form">
                <button type="submit" name="confirmation_home" class="submit_form">Valider</button>
                </form>    
            </div>
            <div class="form_about">
                <form action="" method="post">
                <div class="input_form">
                <textarea name="description_u" cols="45" rows="5" placeholder="description"></textarea><br><br>
                <input type="text" name="skill" placeholder="Competence">
                <input type="number" name="level" placeholder="niveau">
                </div>    
                <button name="confirmation_about" type="submit" class="submit_form">Valider</button>
                </form>
            </div>

            <div class="form_project">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="input_form">
                <input name="info_p" type="text" placeholder="information">
                <input name="skills_p" type="text" placeholder="skills">
                </div>  
                <input type="file" name="img_pro" placeholder="Nom" class="img_form">
                <button name="confirmation_p" type="submit" class="submit_form">Valider</button>
                </form>
            </div>
    </aside>

       

        <main> 
            <header class="home" id="home"><br><br>
            <h1>Je suis <?= $info_user[0]['prenom'] . " " . $info_user[0]["nom"] ?></h1>
            <h5>B1 INGESUP</h5>
            <img src="image/<?= $info_user[0]["image_u"] ?>" alt="">
            </header>
        </main>

        <section class="section_about" id="about">
            <h2>A propos de moi</h2>
            <p>
                <span>Bonjour, je suis <?= $info_user[0]['prenom'] ?></span> <?= $info_user[0]['description_u'] ?>
            </p>
            

            <h3>Mes Compétences</h3>

            <?php if (!empty($info_competence)) :
            foreach ($info_competence as $key => $value) : ?>
            <p><?= $value["nom_compet"] ?></p>
            <div class="container">
                <div style="width:<?= $value["niveau"] ?>%" class="competence python"><?= $value["niveau"] ?>%</div>
            </div>
            <?php if ($_SESSION["modification"] == 1) : ?>
            <a href="removeCompetence.php?id_competence=<?= $value["id_competence"] ?>"><i class="material-icons md-36">backspace</i></a>
            <?php endif; endforeach; endif ?>

        </section>

        <section class="section_project" id="project">
            <h2>Projets</h2>
            <div class="tout">
            <?php if (!empty( $info_creer)) :
              foreach ( $info_creer as $key => $value) : ?>
                <div class="col">
                    <img src="image_projet/<?= $value["image_projet"] ?>" alt="">
                    <h3><?=$value["nom_projet"]?> - <?=$value["type_projet"]?></h3>
                </div>
                <?php if ($_SESSION["modification"] == 1) : ?>
            <a href="removeProjet.php?id_projet=<?= $value["id_projet"] ?>"><i class="material-icons md-36">backspace</i></a>
            <?php endif; endforeach; endif ?>
            </div>    
        </section>



        <section class="contact" id="contact">
                <form class="form_contact" action="" method="post">
            <div>
              <label for="name">Nom :</label>
              <input type="text" id="name" name="user_name" />
            <div>
            <div>
              <label for="mail">E-mail :</label>
              <input type="email" id="mail" name="user_email" />
            </div>
            <div>
              <label for="msg">Message:</label>
              <textarea id="msg" name="user_message"></textarea>
            </div>
            <div>
                    <button type="submit">Envoyer le message</button>
                </div>
          
            </div>
        </form>

        </section>


        <footer>
            <section class="top">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-github"></i></a>

            </section>

            <section class="bot">
                <p>&copy 2019 | All rights reserved</p>

            </section>
        </footer>
</body>
</html>