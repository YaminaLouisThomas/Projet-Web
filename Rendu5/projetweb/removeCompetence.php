<?php require_once("includes/function.php"); 

$deleteCompetence = $pdo->prepare(
    'DELETE FROM competence WHERE id_competence = "' . $_GET["id_competence"] . '"'
);
$deleteCompetence->execute();

$deleteAvoir = $pdo->prepare(
    'DELETE FROM avoir WHERE id_competence = "' . $_GET["id_competence"] . '"'
);
$deleteAvoir->execute();

header("location: cv_utilisateur.php");
?>