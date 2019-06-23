<?php require_once("includes/header.php");
$info_user_admin = $pdo->query(
    'SELECT * FROM utilisateur'
);
$info_user_admin = $info_user_admin->fetchAll(PDO::FETCH_ASSOC);
if($_SESSION['admin'] == 0){
    header("location: cv_utilisateur.php");
}

?>

<h1>Admin</h1>
<a href="cv_utilisateur.php">retourner sur son cv</a>
<table class="content-table">
    <thead>
        <tr>
            <td>ID Utilisateur</td>
            <td>Nom Prenom</td>
            <td>Mail</td>
            <td>CV</td>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($info_user_admin as $key => $value) : ?>
        <tr>
            <td><?= $value["id_utilisateur"] ?></td>
            <td><?= $value["prenom"] . " " . $value["nom"] ?></td>
            <td><?= $value["adresse_mail"] ?></td>
            <td><a href="cv_utilisateur.php?id=<?= $value["id_utilisateur"] ?>">CV<?= $value["id_utilisateur"] ?></a></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>


