<?php require_once("includes/function.php"); 

$deleteCompetence = $pdo->prepare(
    'DELETE FROM projet WHERE id_projet = "' . $_GET["id_projet"] . '"'
);
$deleteCompetence->execute();

$deleteAvoir = $pdo->prepare(
    'DELETE FROM avoir WHERE id_projet = "' . $_GET["id_projet"] . '"'
);
$deleteAvoir->execute();

header("location: cv_utilisateur.php");
?>