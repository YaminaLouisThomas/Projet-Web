<?php require_once("includes/header.php");
?>
<form action="" method="post" class="form_demo">
    <?php if (!empty($erreur_inscription[0])) : ?>
        <h2><?= $erreur_inscription[0] ?></h2>
    <?php endif ?>
    <select name="sexe" class="inputbasic">
        <option>Mme</option>
        <option>Mr</option>
    </select>
    <input class="inputbasic" type="text" name="prenom" placeholder="prenom">
    <input class="inputbasic" type="text" name="nom" placeholder="nom">
    <select name="age" class="inputbasic">
        <option>Age
            <?php for ($i = 15; $i <= 100; $i++) : ?>
            <option><?= $i ?>
            <?php endfor ?>

    </select>
    <input type="email" name="Email" placeholder="Adresse mail" class="inputbasic">
    <input type="password" name="mdp" placeholder="mot de passe" class="inputbasic">
    <input type="password" name="Cmdp" placeholder="Confirmez mdp" class="inputbasic">
    <input type="date" name="date" placeholder="date de naissance" class="inputbasic">
    <textarea name="description_u" cols="45" rows="5" placeholder="description" class="inputbasic"></textarea><br><br>
    <input type="text" name="tel" placeholder="téléphone" class="inputbasic">
    <input type="text" name="info" placeholder="info_addi" class="inputbasic">
    <input type="text" name="qualite" placeholder="qualité personnelle" class="inputbasic">
    <button class="inputbasic" type="submit" name="submit_inscription">S'inscrire</button>


</form>
</body>

</html>