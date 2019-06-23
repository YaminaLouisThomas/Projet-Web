<?php if (isset($_GET["page"]) && $_GET["page"] === "yamina" || $_SERVER["SCRIPT_NAME"] === "/projetweb/yamina.php") : ?>
<img class="burger" onclick="burger()" src="image/icons8-menu-filled-50.png" alt="">
    <aside>
        <nav>
            <img src="https://scontent-cdt1-1.xx.fbcdn.net/v/t1.0-9/21742813_1144849852326768_1813250249697709017_n.jpg?_nc_cat=107&_nc_ht=scontent-cdt1-1.xx&oh=9cfd539ab60b6c960695177a1e1414f3&oe=5CE854D2" alt="">
            <a href="#home"><i class="material-icons md-36">home</i>
            <p>Accueil</p>
            </a>

            <a href="#about"><i class="material-icons md-36">person</i>
            <p>A Propos</p>
            </a>

            <a href="#projets"><i class="material-icons md-36">image</i>
            <p>Projets</p>
            </a>

            <a href="#contact"><i class="material-icons md-36">mail</i>
            <p>Contact</p>
            </a>

            <a href=""><i class = "material-icons"> perm_media</i>
                <p>Admin</p>
                </a>
        </nav>
<?php endif ?>