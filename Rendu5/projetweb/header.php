<?php require_once("includes/function.php"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="css/navbar.css">
    <script  src = "https://unpkg.com/ionicons@4.5.9-1/dist/ionicons.js" > </script>
    <?php if (isset($_GET["page"]) && $_GET["page"] === "yamina" || $_SERVER["SCRIPT_NAME"] === "/projetweb/yamina.php") : ?> 
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/portfolio.css">
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/yamina.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.3.1.js" async></script>
    <script src="JS/burgerCV.js" async></script>
    <?php elseif (isset($_GET["page"]) && $_GET["page"] === "connexion" || $_SERVER["SCRIPT_NAME"] === "/projetweb/connexion.php") : ?> 
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/connexion.css">
    <?php elseif (isset($_GET["page"]) && $_GET["page"] === "admin" || $_SERVER["SCRIPT_NAME"] === "/projetweb/admin.php") : ?> 
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/administrateur.css">
    <?php endif; ?> 
    <link rel="stylesheet" href="css/error.css">
    <title>ProjetWeb</title>
</head>
<body>
    <header>
        <?php require_once("includes/nav.php") ?>
    </header>

    <main>