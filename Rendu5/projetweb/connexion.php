<?php require_once("includes/header.php");
if(!isset($_SESSION["connected"])) :
?>
<h1 class="title">Projet Web</h1>
<div class="login">
<h1>Connexion</h1>
<form action="" method="post">
<div class="signin">
<ion-icon class="icon" name="person"></ion-icon>
<input style="background-color: none" type="text" name="mail" placeholder="Mail">
</div>
<div class="signin">
<ion-icon class="icon" name="lock"></ion-icon>
<input type="password" name="mdpco" placeholder="Mot de passe">
</div>
<button name="submitco" class="submitco" type="submit">connexion</button>
<a class="msg" href="inscription.php">inscrivez vous</a> 
</form>
<?php if (!empty($erreur_co[0])): ?>
<h2><?=$erreur_co[0] ?></h2>
<?php endif ?>
<?php else : ?>
<a class="msg" href="deconnexion.php">deconnexion</a>
<?php endif; ?>
</div>